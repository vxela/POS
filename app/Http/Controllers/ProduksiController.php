<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('produksi.index');
    }

    public function listAll() 
    {
        $data_produk = \App\Models\Tbl_product::all();
        // dd($data_produk);
        return view('produksi.list_table', ['data_produk' => $data_produk]);
    }

    public function add() 
    {
        return view('produksi.add_form');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $produk_data = \App\Models\Tbl_product::find($id);
        // dd($produk_data);
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
        $produk_data = \App\Models\Tbl_product::find($id);
        // dd($produk_data);
        return view('produksi.produk_edit', ['data_produk' => $produk_data]);
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

    public function delete($id) {

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
        //
    }
}
