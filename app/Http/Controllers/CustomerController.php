<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Tbl_customer as Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function src_customer(Request $request) {

        if($request->get('query')) {
            $str = $request->get('query');
            $data = Customer::where('ctm_name', 'like', '%'.$str.'%')
                                ->orWhere('ctm_name', 'like', '%'.$str.'%')
                                ->get();

            $outPut = '<ul class="dropdown-menu" style=" width:100%; display:block; position:absolute; max-height:300px; overflow:auto;">';

            foreach ($data as $row) {
                $outPut .= '<li><a href="#" id="list_cust" data-id_cust="'.$row->id.'" data-name_cust="'.$row->ctm_name.'" class="notification-item list_cust"><div>'.$row->ctm_name.'</div><div><small>'.$row->ctm_org_address.'</small></div></a></li>';
            }

            $outPut .= '</ul>';
            echo $outPut;
            // // return $data;
            // return response()->json($data);
        }

        // return response()->json($data);
    }
}
