<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use Illuminate\Support\Facades\Session;

class OrganisasiController extends Controller
{
    public function __construct(){
        $this->_tipe = 'organisasi';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Riwayat::where('tipe',$this->_tipe)->orderBy('id','desc')->get();
        return view('dashboard.organisasi.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.organisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('judul',$request->judul);
        Session::flash('info1',$request->info1);
        Session::flash('isi',$request->isi);
        $request->validate([
            'judul'=>'required',
            'info1'=>'required',
            'isi'=>'required'
        ],[
            'judul.required'=>'Judul wajib diisi',
            'info1.required'=>'Nama Sekolah wajib diisi',
            'isi.required'=>'Isian tulisan wajib diisi'
        ]);
        $data = [
            'judul'=>$request->judul,
            'info1'=>$request->info1,
            'tipe'=>$this->_tipe,
            'isi'=>$request->isi
        ];
        Riwayat::create($data);
        return redirect()->route('organisasi.index')->with('success','Berhasil menambahkan data organisasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Riwayat::where('id',$id)->where('tipe',$this->_tipe)->first();
        return view('dashboard.organisasi.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul'=>'required',
            'info1'=>'required',
            'isi'=>'required'
        ],[
            'judul.required'=>'Judul wajib diisi',
            'info1.required'=>'Nama sekolah wajib diisi',
            'isi.required'=>'Isian tulisan wajib diisi'
        ]);
        $data = [
            'judul'=>$request->judul,
            'tipe'=>$this->_tipe,
            'info1'=>$request->info1,
            'isi'=>$request->isi
        ];
        Riwayat::where('id',$id)->where('tipe',$this->_tipe)->update($data);
        return redirect()->route('organisasi.index')->with('success','Berhasil melakukan update data organisasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Riwayat::where('id',$id)->where('tipe',$this->_tipe)->delete();
        return redirect()->route('organisasi.index')->with('success','Berhasil menghapus data organisasi');
    }
}
