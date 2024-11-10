<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\pekerjaan; // Ubah menjadi pekerjaan dengan huruf kecil
use App\Models\Lowongan; // Ubah menjadi pekerjaan dengan huruf kecil

class pekerjaanController extends Controller // Ubah menjadi pekerjaanController dengan huruf kecil
{
    public function halamanpesan() {
        return view('editpegawai', [
            'data_pekerjaan' => pekerjaan::get(), // Ubah menjadi pekerjaan dengan huruf kecil
        ]);
    }
    public function halamanlowongan() {
        
        return view('lowongan', [
            'data_pekerjaan' => pekerjaan::get(), // Ubah menjadi pekerjaan dengan huruf kecil
        ]);
    }
    public function delete($id_pekerjaan)
    {
        Lowongan::destroy($id_pekerjaan);
        return redirect ('/lowongan')->with('success','Data Pekerjaan Berhasil Dihapus');
    }
    public function tambahlowongan(Request $request) {
        $pekerjaan = Lowongan::create([
            'Perusaahaan'=> $request->Perusaahaan,
            'judul'=> $request->judul,
            'deskripsi'=> $request->deskripsi,
            'persyaratan'=> $request->persyaratan,
            'lokasi'=> $request->lokasi,
            'gaji'=> $request->gaji,
            'tgl_posting'=> $request->tgl_posting,
            'tgl_expired'=> $request->tgl_expired,
            'status'=> $request->status,
        ]);
        return redirect("lowongan");
    }
    public function edit($id) {
        $pekerjaan = Lowongan::find($id);
        return view('editlowongan', ['pekerjaan' => $pekerjaan]);
    }
    public function update(Request $request, $id) {
        $pekerjaan = Lowongan::find($id);
        $pekerjaan->Perusaahaan = $request->Perusaahaan;
        $pekerjaan->judul = $request->judul;
        $pekerjaan->deskripsi = $request->deskripsi;
        $pekerjaan->persyaratan = $request->persyaratan;
        $pekerjaan->lokasi = $request->lokasi;
        $pekerjaan->gaji = $request->gaji;
        $pekerjaan->tgl_posting = $request->tgl_posting;
        $pekerjaan->tgl_expired = $request->tgl_expired;
        $pekerjaan->status = $request->status;
        $pekerjaan->save();
        return redirect()->route('lowongan')->with('success', 'Data pekerjaan berhasil diubah.');
    }
    public function pencaker() {
            $data_pekerjaan = pekerjaan::get();
            return view('homepencaker', ['data_pekerjaan' => $data_pekerjaan]);
        }

    public function getDataCount()
    {
        $count = pekerjaan::count(); // Ubah menjadi pekerjaan dengan huruf kecil
        
        return view('homepegawai', ['count' => $count]);
    }
    public function store(Request $request)
    {
        $pekerjaan = new pekerjaan(); // Ubah menjadi pekerjaan dengan huruf kecil
    
        $pekerjaan->Perusaahaan = $request->Perusaahaan;
        $pekerjaan->judul = $request->judul;
        $pekerjaan->deskripsi = $request->deskripsi;
        $pekerjaan->persyaratan = $request->persyaratan;
        $pekerjaan->lokasi = $request->lokasi;
        $pekerjaan->gaji = $request->gaji;
        $pekerjaan->tgl_posting = $request->tgl_posting;
        $pekerjaan->tgl_expired = $request->tgl_expired;
        $pekerjaan->status = $request->status;
    
        $pekerjaan->save();
    
        session()->flash('info', 'Data Berhasil Dikirim.');
    
        return redirect()->route('pegawailoker');
    }
    
    public function editpesan() {
        return view('createpegawai', [
            'data_pekerjaan' => pekerjaan::get(), // Ubah menjadi pekerjaan dengan huruf kecil
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $location = $request->location;
        $query = pekerjaan::query();

        if ($keyword) {
            $query->where('judul', 'LIKE', "%{$keyword}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$keyword}%")
                  ->orWhere('persyaratan', 'LIKE', "%{$keyword}%");
        }

        if ($location) {
            $query->where('lokasi', 'LIKE', "%{$location}%");
        }

        $data_pekerjaan = $query->get();

        return view('homepencaker', ['data_pekerjaan' => $data_pekerjaan]);
    }

//     public function showHomePage()
// {
//     $data_pekerjaan = pekerjaan::all(); // Retrieve all data from the 'pekerjaan' table
//     return redirect()->route('pencaker'); // Pass the data to the view
// }

}
