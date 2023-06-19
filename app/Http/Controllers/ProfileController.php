<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }
    public function update(Request $req)
    {
        $req->validate([
            'foto' => 'mimes:jpg,jpeg,png,gif',
            '_email' => 'required|email',
        ],[
            '_foto.mimes' => 'Foto yang dimasukan hanya diizinkan berekstensi JPEG, JPG, PNG, GIF',
            '_email.required' => 'Email wajib diisi',
            '_email.email' => 'Format email yang dimasukan tidak valid',
        ]);
        if ($req->hasFile('_foto')) {
            $foto_file = $req->file('_foto');
            $foto_extensi = $foto_file->extension();
            $foto_baru = date('ymdhis').'.'.$foto_extensi;
            $foto_file->move(public_path('foto'),$foto_baru);

            $foto_lama = get_meta_value('_foto');
            File::delete(public_path('foto')."/".$foto_lama);
            MetaData::updateOrCreate(['meta_key'=>'_foto'],['meta_value'=>$foto_baru]);
        }
        MetaData::updateOrCreate(['meta_key'=>'_email'],['meta_value'=>$req->_email]);
        MetaData::updateOrCreate(['meta_key'=>'_kota'],['meta_value'=>$req->_kota]);
        MetaData::updateOrCreate(['meta_key'=>'_provinsi'],['meta_value'=>$req->_provinsi]);
        MetaData::updateOrCreate(['meta_key'=>'_nohp'],['meta_value'=>$req->_nohp]);
        MetaData::updateOrCreate(['meta_key'=>'_facebook'],['meta_value'=>$req->_facebook]);
        MetaData::updateOrCreate(['meta_key'=>'_instagram'],['meta_value'=>$req->_instagram]);
        MetaData::updateOrCreate(['meta_key'=>'_tiktok'],['meta_value'=>$req->_tiktok]);
        MetaData::updateOrCreate(['meta_key'=>'_github'],['meta_value'=>$req->_github]);

        return redirect()->route('profile.index')->with('success','Berhasil update data profile');
    }
}
