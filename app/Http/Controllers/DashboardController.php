<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Halaman;

class DashboardController extends Controller
{
    function index(){
        $data = halaman::orderBy('judul','asc')->get();
        return view('dashboard.halaman.index')->with('data',$data);
    }
}
