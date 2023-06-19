<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Halaman;
use Illuminate\Support\Facades\Session;

class HalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.halaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    function index(){
        $data = Halaman::orderBy('judul','asc')->get();
        return view('dashboard.halaman.index')->with('data', $data);
    }

    public function store(Request $request)
    {
        Session::flash('judul',$request->judul);
        Session::flash('isi',$request->isi);
        $request->validate([
            'judul'=>'required',
            'isi'=>'required'
        ],[
            'judul.required'=>'Judul wajib diisi',
            'isi.required'=>'Isian tulisan wajib diisi'
        ]);
        $data = [
            'judul'=>$request->judul,
            'isi'=>$request->isi
        ];
        halaman::create($data);
        return redirect()->route('dashboard')->with('success','Berhasil menambahkan data');
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
        $data = Halaman::where('id',$id)->first();
        return view('dashboard.halaman.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul'=>'required',
            'isi'=>'required'
        ],[
            'judul.required'=>'Judul wajib diisi',
            'isi.required'=>'Isian tulisan wajib diisi'
        ]);
        $data = [
            'judul'=>$request->judul,
            'isi'=>$request->isi
        ];
        halaman::where('id',$id)->update($data);
        return redirect()->route('dashboard')->with('success','Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Halaman::where('id',$id)->delete();
        return redirect()->route('dashboard')->with('success','Berhasil menghapus data');
    }
}
