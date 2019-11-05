<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon as Carbon;
use Session;
use Mush;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faktur = \App\Models\Tbl_faktur::all();
        return view('penjualan.index', ['data_faktur' => $faktur]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = \App\Models\Tbl_product::all();
        $order = \App\Models\Tbl_temp_po::where('trans_session', '=', session('transKey'))->get();
        return view('penjualan.create_sale', ['data_produk' => $produk, 'data_order' => $order]);
    }

    public function flushSs() {
        Session::forget('transKey');
        Session::forget('customer');
        \App\Models\Tbl_temp_po::truncate();
        return back();
        

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $trans_key = $request->trans_key;
        if(is_null($trans_key) || $trans_key == '') {
            Session::flash('status', 'error');
            Session::flash('msg', 'Something Wrong :(');
            return back();
        } else {

            DB::beginTransaction();

            try {

                $data['cust_id'] = Session::get('customer.cust_id');

                $data_temp = \App\Models\Tbl_temp_po::where('trans_session', $trans_key)->get();
                $row_po = \App\Models\Tbl_faktur::count();
    
                if($row_po > 0) {
                    $date = Carbon::now()->format('Ymd');
                    $fktr = \App\Models\Tbl_faktur::orderBy('id', 'desc')->first();
                    $date_ls = substr($fktr->nota_number,0,8);
                    
                    if($date == $date_ls){
                        $nota = (int)substr($fktr->nota_number, 8, 3);
                        $nota_id = $nota + 1;
                    } else {
                        $nota_id = 1;
                    }
                } else {
                    $nota_id = 1;
                }
                $str_id = str_pad(strval($nota_id), 3, '0', STR_PAD_LEFT);
                $nota_number    = Carbon::now()->format('Ymd').$str_id;
                $cust_id        = Session::get('customer.cust_id');
                $biaya_total    = 0;
                $data = array();
                $id_temp = array();
    
                foreach ($data_temp as $temp) {
                    array_push($id_temp, $temp->id);
                    array_push($data, array(
                        'nota_number'   => $nota_number,
                        'barang_id'     => $temp->barang_id,
                        'jml_barang'    => $temp->jml_barang,
                        'diskon_satuan' => 0,
                        'order_price'   => $temp->order_price,
                        'customer_id'   => $cust_id, 
                        'user_id'       => auth()->user()->id,
                        'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
                    ));
                    $biaya_total = $biaya_total + $temp->order_price;
                }
                $data_nota = array(
                    'nota_number'       => $nota_number,
                    'customer_id'       => $cust_id,
                    'id_pengiriman'     => 0,
                    'order_date'        => Carbon::now()->format('Y-m-d'),
                    'order_price'       => $biaya_total,
                    'status_pembayaran' => 'utang',
                    'sisa_pembayaran'   => $biaya_total,
                    'user_id'           => auth()->user()->id,
                    'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at'        => Carbon::now()->format('Y-m-d H:i:s')
                );



                $faktur = \App\Models\Tbl_faktur::insert($data_nota);
                $po = \App\Models\Tbl_po::insert($data);
                $po_temp = \App\Models\Tbl_temp_po::where('trans_session', $trans_key)->forceDelete();
                // for($i=0; $i<count($id_temp); $i++) {
                //     $po_temp->forceDelete();
                // }

                Session::forget('transKey');
                Session::forget('customer');

                DB::commit();

                Session::flash('status', 'success');
                Session::flash('msg', 'Transaction Succes!');

                return back();

            } catch (Exception $e) {
                
                DB::rollback;
                report($e);
                Session::flash('status', 'error');
                Session::flash('msg', 'Transaction Failed');                
                return false;

            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faktur = \App\Models\Tbl_faktur::find($id);
        // echo $faktur->nota_number;
        $sale = \App\Models\Tbl_po::where('nota_number', $faktur->nota_number)->get();

        // dd($sale);

        return view('penjualan.show_faktur', ['data_faktur' => $faktur, 'data_sale' => $sale]);
    }

    public function notaPrint($id) {

        $faktur = \App\Models\Tbl_faktur::find($id);
        $sale = \App\Models\Tbl_po::where('nota_number', $faktur->nota_number)->get();

        return view('prints.nota_one', ['data_faktur' => $faktur, 'data_sale' => $sale]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('penjualan.edit_sale');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id){
        
        return view('penjualan.delete_sale');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
