<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardManajemenController extends Controller
{
    //
    public function index() {
        return view('manajemen.index');
    }    
}
