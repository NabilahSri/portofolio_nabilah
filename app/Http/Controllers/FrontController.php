<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Halaman;
use App\Models\Riwayat;

class FrontController extends Controller
{
    public function index()
    {
        $about_id = get_meta_value('_halaman_about');
        $about_data = Halaman::where('id',$about_id)->first();
        $award_id = get_meta_value('_halaman_award');
        $award_data = Halaman::where('id',$award_id)->first();

        $experience_data = Riwayat::where('tipe','organisasi')->get();
        $education_data = Riwayat::where('tipe','pendidikan')->get();
        return view('front.index')->with([
            'about' => $about_data,
            'award' => $award_data,
            'experience' => $experience_data,
            'education' => $education_data,
        ]);
    }
}
