<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use Illuminate\Support\Facades\Session;

class PendidikanController extends Controller
{
    public function __construct(){
        $this->_tipe = 'pendidikan';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Riwayat::where('tipe',$this->_tipe)->orderBy('id','desc')->get();
        return view('dashboard.pendidikan.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('judul',$request->judul);
        Session::flash('info1',$request->info1);
        Session::flash('info2',$request->info2);
        Session::flash('tahun_mulai',$request->tahun_mulai);
        Session::flash('tahun_akhir',$request->tahun_akhir);
        $request->validate([
            'judul'=>'required',
            'tahun_mulai'=>'required'
        ],[
            'judul.required'=>'Judul wajib diisi',
            'tahun_mulai.required'=>'Tahun Mulai wajib diisi'
        ]);
        $data = [
            'judul'=>$request->judul,
            'info1'=>$request->info1,
            'info2'=>$request->info2,
            'tahun_mulai'=>$request->tahun_mulai,
            'tahun_akhir'=>$request->tahun_akhir,
            'tipe'=>$this->_tipe
        ];
        Riwayat::create($data);
        return redirect()->route('pendidikan.index')->with('success','Berhasil menambahkan data pendidikan');
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
        return view('dashboard.pendidikan.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul'=>'required',
            'tahun_mulai'=>'required'
        ],[
            'judul.required'=>'Judul wajib diisi',
            'tahun_mulai.required'=>'Tahun Mulai wajib diisi'
        ]);
        $data = [
            'judul'=>$request->judul,
            'info1'=>$request->info1,
            'info2'=>$request->info2,
            'tahun_mulai'=>$request->tahun_mulai,
            'tahun_akhir'=>$request->tahun_akhir,
            'tipe'=>$this->_tipe
        ];
        Riwayat::where('id',$id)->where('tipe',$this->_tipe)->update($data);
        return redirect()->route('pendidikan.index')->with('success','Berhasil melakukan update data pendidikan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Riwayat::where('id',$id)->where('tipe',$this->_tipe)->delete();
        return redirect()->route('pendidikan.index')->with('success','Berhasil menghapus data pendidikan');
    }
}
