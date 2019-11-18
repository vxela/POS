<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = \App\Models\Tbl_faktur::all();
        $tool = \App\Models\Tbl_shipment_tool::all();
        
        return view('pengiriman.setup_kirim', ['data_order' => $order, 'data_tool' => $tool]);

    }

    public function SendOrder(Request $request)
    {
        dd($request->all());
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function AjaxUpdateOne(Request $request) {

        $ndata = \App\Models\Tbl_shipments::where('nota_id', $request->id_order)->count();

        // echo $ndata;
        
        $data_shipment = array(
            'nota_id' => $request->id_order,
            'customer_id' => $request->id_tool,
            'user_id' => auth()->user()->id
        );

        if($ndata == 0) {
            $shipment = \App\Models\Tbl_shipments::create($data_shipment);
        } else {
            $shipment = \App\Models\Tbl_shipments::where('nota_id', $request->id_order)
                        ->update(['customer_id' => $request->id_tool]);
        }

        
        if($shipment) {
            echo "success";
        } else {
            echo "fail";
        }
        
    }
}
