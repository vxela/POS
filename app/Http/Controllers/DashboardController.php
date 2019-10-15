<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        // if(auth()->user()->user_role == 'admin') {
        //     return view('dashboard.index');
        // } elseif(auth()->user()->user_role == 'manajemen') {
        //     return view('manajemen.index');
        // } elseif(auth()->user()->user_role == 'gudang') {
        //     return view('produksi.index');
        // } elseif(auth()->user()->user_role == 'kasir') {
        //     return view('penjualan.index');
        // }
        
        return view('dashboard.index');
    }
}
