<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;

class SkillController extends Controller
{
    public function index()
    {
        $skill_url = public_path('admin/devicon.json');
        $skill_data = file_get_contents($skill_url);
        $skill_data = json_decode($skill_data,true);
        $skill = array_column($skill_data,'name');
        $skill = "'".implode("','",$skill)."'";
        return view('dashboard.skill.index')->with(['skill'=>$skill]);
    }
    public function update(Request $req)
    {
        if ($req->method()=='POST') {
            $req->validate([
                '_language'=>'required',
                '_workflow'=>'required',
            ],
            [
                '_language.required' => 'Silahkan masukan bahasa pemrograman yang di kuasai',
                '_workflow.required' => 'Silahkan masukan workflow yang di kuasai',
            ]);
            MetaData::updateOrCreate(['meta_key'=>'_language'],['meta_value'=>$req->_language]);
            MetaData::updateOrCreate(['meta_key'=>'_workflow'],['meta_value'=>$req->_workflow]);

            return redirect()->route('skill.index')->with('success','Berhasil meakukan update data skill.');
        }
    }
}
