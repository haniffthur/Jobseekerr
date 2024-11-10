<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;

class Perusahaan extends Controller
{
    public function halamanperusahaan()
    {
        $lowongan = Lowongan::all();
        return view("perusahaanloker.halamanperusahaan", compact("lowongan"));
    }
}
