<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = \App\Models\Tbl_faktur::where('id_pengiriman', '=', '0')->get();
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
        $shipment = \App\Models\Tbl_shipments::where('tool_id', $id)->get();
        $tool = \App\Models\Tbl_shipment_tool::all();

        // dd($shipment);
        return view('pengiriman.show_kirim', ['data_shipment' => $shipment, 'data_tool' => $tool]);
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

        $d_faktur = \App\Models\Tbl_faktur::find($request->id_order);

        // echo $ndata;
        
        $data_shipment = array(
            'nota_id' => $request->id_order,
            'customer_id' => $d_faktur->getCustomer()->id,
            'tool_id'=> $request->id_tool,
            'user_id' => auth()->user()->id
        );

        if($ndata == 0) {
            DB::beginTransaction();
            try {
                $shipment = \App\Models\Tbl_shipments::create($data_shipment);
                $nota = \App\Models\Tbl_faktur::find($shipment->nota_id);
                    $nota->id_pengiriman = $shipment->id;
                    $nota->save();
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                report($e);
                return false;
            }
        } else {
            $shipment = \App\Models\Tbl_shipments::where('nota_id', $request->id_order)
                        ->update(['tool_id' => $request->id_tool]);
        }

        
        if($shipment) {
            echo "success";
        } else {
            echo "fail";
        }
        
    }

    public function AjaxGetLeft() {
        // return Response::json(\App\Models\Tbl_shipments::where('tool_id', 1)->get());
        $data_ship = \App\Models\Tbl_shipments::where('tool_id', 1)->get();
        $n=1;
        $str = "";
        foreach($data_ship as $ship) {
        $str .=  
            "<tr>
                <td>
                    ".
                    $n++
                    ."    
                </td>
                <td>
                    ".
                    $ship->getCustomer()->ctm_name
                    ."
                </td>
                <td>
                    ".
                    $ship->getCustomer()->ctm_org_address
                    ."
                </td>
                <td>
                    ".
                    $ship->getTool()->tool_name
                    ."
                </td>
            </tr>";
        }

        return $str;
    }
}
