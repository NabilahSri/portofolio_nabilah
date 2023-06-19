<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Halaman;
use App\Models\MetaData;

class PengaturanHalamanController extends Controller
{
    public function index()
    {
        $dataHalaman = Halaman::orderBy('judul','asc')->get();
        return view('dashboard.pengaturanHalaman.index')->with('dataHalaman',$dataHalaman);
    }
    public function update(Request $req)
    {
        MetaData::updateOrCreate(['meta_key'=>'_halaman_about'],['meta_value'=>$req->_halaman_about]);
        MetaData::updateOrCreate(['meta_key'=>'_halaman_award'],['meta_value'=>$req->_halaman_award]);
        return redirect()->route('pengaturanHalaman.index')->with('success','Berhasil update data pengaturan halaman');
    }
}
