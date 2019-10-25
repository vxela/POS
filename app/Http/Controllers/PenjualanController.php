<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

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
    //
            // $temp = new \App\Models\Tbl_temp_po;

            // $temp->nota_id = "THISISNOTAID";
            // $temp->barang_id = $request->produk_id;
            // $temp->jml_barang = $request->jml_produk;
            // $temp->order_price = $request->harga_total;
            // $temp->customer_id = $request->customer_name."1";
            // $temp->user_id = auth()->user()->id;
            // $temp->created_at = Carbon::now()->format('Y-m-d H:i:s');
            // $temp->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            // $temp->save();

            // $order = \App\Models\Tbl_temp_po::where('nota_id', '=', 'THISISNOTAID')->get();

            // dd($order);
            // return redirect()->back()->with($order);
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
