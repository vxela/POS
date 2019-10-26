<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
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
        return view('penjualan.create_sale', ['data_produk' => $produk]);
    }

    public function storeTemp(Request $request) 
    {
        $data = [
            'nota_id' => "THISISNOTAID",
            'barang_id' => $request->produk_id,
            'jml_barang' => $request->jml_produk,
            'order_price' => $request->harga_total,
            'customer_id' => $request->customer_name."1",
            'user_id' => auth()->user()->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
            if(Session::has('transKey')) {
                $data['trans_session'] = session('transKey');

            } else {
                session(['transKey' => Mush::getUniqStr()]);
                $data['trans_session'] = session('transKey');
            }

            $porder = \App\Models\Tbl_temp_po::create($data);
            
            $order = \App\Models\Tbl_temp_po::where('trans_session', '=', session('transKey'))->get();
            if($order->isEmpty()) {
                
                $produk = \App\Models\Tbl_product::all();
                return view('penjualan.create_sale', ['data_produk' => $produk]);
            } 
            else {
                $produk = \App\Models\Tbl_product::all();
                return view('penjualan.create_sale', ['data_produk' => $produk, 'data_order' => $order]);                
            }
    //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());        
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
