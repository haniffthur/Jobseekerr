<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Pencaker;
use App\Models\Pekerjaan;
use App\Models\ApplyPencaker;

class PencakerController extends Controller
{
    public function index()
    {
       
         $data_pencaker = Pencaker::with('lowongan')->paginate(2);
         return view('datapencaker',compact('data_pencaker'));
    }
    public function apply($id_pekerjaan){
        return view('homepencaker',[
            'data_pekerjaan' => Pekerjaan::find($id_pekerjaan)
        ]);
    }

}
