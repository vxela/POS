<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produksi = \App\Models\Tbl_production::all();

        return view('produksi.tabel_produksi', ['data_produksi' => $produksi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = \App\Models\Tbl_product::all();
        return view('produksi.create_produksi', ['produk_data' => $produk]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produksi = new \App\Models\Tbl_production;

        $produksi->product_id = $request->id_produk;
        $produksi->product_quantity = $request->jml_produksi;
        $produksi->activity_date = Carbon::now()->format('Y-m-d H:i:s');
        $produksi->user_id = auth()->user()->id;
        $produksi->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $produksi->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $produksi->save();

        return redirect('/produksi')->with('status', 'Tambah data sukses');
        

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
        $produksi = \App\Models\Tbl_production::find($id);
        return view('produksi.show_produksi', ['data_produksi' => $produksi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = \App\Models\Tbl_product::all();
        $produksi = \App\Models\Tbl_production::find($id);
        return view('produksi.edit_produksi', ['data_produk' => $produk, 'data_produksi' => $produksi]);
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
        $produksi = \App\Models\Tbl_production::find($id);

        $produksi->product_id = $request->id_produk;
        $produksi->product_quantity = $request->jml_produksi;
        $produksi->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $produksi->save();

        return redirect()->back()->with('status', 'Tambah data sukses');
    }


    public function delete($id)
    {
        $produksi = \App\Models\Tbl_production::find($id);

        return view('produksi.delete_produksi', ['data_produksi' => $produksi]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produksi = \App\Models\Tbl_production::find($id);

        $produksi->forceDelete();

        return redirect('/produksi')->with('status', 'Delete data sukses');

    }
}
