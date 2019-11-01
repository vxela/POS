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
        $penjualan = \App\Models\Tbl_sale::all();
        return view('penjualan.index', ['data_penjualan' => $penjualan]);
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
                    $nota = \App\Models\Tbl_faktur::max('id');
                    $nota_id = $nota + 1;
                } else {
                    $nota_id = 1;
                }
                $str_id = str_pad(strval($nota_id), 3, '0', STR_PAD_LEFT);
                $nota_number    = Carbon::now()->format('Ymd').$str_id;
                $cust_id        = Session::get('customer.cust_id');
                $biaya_total    = 0;
                $data = array();
    
                foreach ($data_temp as $temp) {
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
                    'user_id'           => auth()->user()->id
                );
                $faktur = \App\Models\Tbl_faktur::insert($data_nota);
                $po = \App\Models\Tbl_po::insert($data);

                DB::commit();

            } catch (Exception $e) {
                
                DB::rollback;
                report($e);
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
        $sale = \App\Models\Tbl_sale::find($id);
        return view('penjualan.show_sale', ['data_penjualan' => $sale]);
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
