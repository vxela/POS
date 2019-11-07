<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Tbl_employee as Employee;
use Session;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = Employee::all();
        $job_field = \App\Models\Tbl_job_field::all();
        return view('admin.index_pegawai', ['data_emp' => $emp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job_field = \App\Models\Tbl_job_field::all();
        return view('admin.create_pegawai', ['data_jobf' => $job_field]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
        'emp_code' => $request->emp_number,
        'emp_name' => $request->emp_name,
        'emp_id_number' => $request->emp_nik,
        'emp_sex' => $request->emp_sex,
        'emp_address' => $request->emp_address,
        'emp_phone_number' => $request->emp_contact,
        'emp_religion' => $request->emp_agama,
        'emp_date_in' => $request->emp_date_in,
        'user_id' => auth()->user()->id
        );
        // dd($request->all());
        $data = Employee::create($data);

        if($data->exists) {
            Session::flash('status', 'success');
            Session::flash('msg', 'Data '.$data->emp_name.' Berhasil di simpan!');
        } else {
            Session::flash('status', 'error');
            Session::flash('msg', 'Tambah Pegawai Gagal!!');
        }

        return redirect()->route('pegawai.index');
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
}
