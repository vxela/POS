<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use \App\User as User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\User::all();
        return view('admin.index_user', ['data_user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emp = \App\Models\Tbl_employee::all();
        return view('admin.create_user', ['data_emp' => $emp]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data_user = array(
            'emp_id'    => $request->id_pegawai,
            'name'  => $request->username,
            'email' => $request->email,
            'password'  => $request->password,
            'user_role' => $request->role,
            'user_id'   => auth()->user()->id,
            'user_status'   => 'aktif'
        );

        $user = User::create($data_user);

        if($user->exists) {
            Session::flash('status', 'success');
            Session::flash('msg', 'Data '.$user->name.' Berhasil di simpan!');
        } else {
            Session::flash('status', 'error');
            Session::flash('msg', 'Tambah Pegawai Gagal!!');
        }

        return back();

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
