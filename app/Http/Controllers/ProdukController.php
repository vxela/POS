<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = \App\Models\Tbl_product::all();
        // dd($data_produk);
        return view('produksi.list_table', ['data_produk' => $produk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $countData = \App\Models\Tbl_product::all();
        $cat_data = \App\Models\Tbl_product_categorie::all();

        if(count($countData) == 0) {
            $lastid = 1;
        } else {
            $lastid =\App\Models\Tbl_product::all()->last()->id+1;
        }

        $id = str_pad($lastid, 4, "00", STR_PAD_LEFT);

        $code_product = array("RXZ".date('Ymd').$id, "RXG".date('Ymd').$id);

        return view('produksi.add_form', ['code_produk' => $code_product, 'data_cat' => $cat_data]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new \App\Models\Tbl_product;

        $product->product_code = $request->produk_code;
        $product->product_name = $request->produk_name;
        $product->category_product_id = $request->produk_kat_id;
        $product->product_price = $request->produk_price;
        $product->product_owner = $request->produk_owner;
        $product->product_desc = $request->produk_desc;
        $product->user_id = auth()->user()->id;
        $product->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $product->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $product->save();

        return redirect('/produk')->with('status', 'Tambah data sukses');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk_data = \App\Models\Tbl_product::find($id);
        return view('produksi.produkdetail', ['data_produk' => $produk_data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat_data = \App\Models\Tbl_product_categorie::all();
        $produk_data = \App\Models\Tbl_product::find($id);
        // dd($produk_data);
        return view('produksi.produk_edit', ['data_produk' => $produk_data, 'data_cat' => $cat_data]);
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

        $produk = \App\Models\Tbl_product::find($id);

        $produk->product_code = $request->produk_code;
        $produk->product_name = $request->produk_name;
        $produk->category_product_id = $request->produk_kat_id;
        $produk->product_price = $request->produk_price;
        $produk->product_owner = $request->produk_owner;
        $produk->product_desc = $request->produk_desc;
        $produk->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $produk->save();

        return back()->with('status', 'Edit data sukses');
    }

    public function delete($id) 
    {

        $produk_data = \App\Models\Tbl_product::find($id);
        return view('produksi.produk_delete', ['data_produk' => $produk_data]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $produk = \App\Models\Tbl_product::find($id);

        $produk->forceDelete();

        return redirect('/produk')->with('status', 'Delete data sukses');

    }

    public function dashboard() {

        return view('/produksi.index');

    }

}
