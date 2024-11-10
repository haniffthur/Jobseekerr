<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Hubungi;


class HKController extends Controller
{

    public function halamanpesan() {
        // Mengambil semua data dari model Hubungi dan mengirimkannya ke view 'adminpesan'
        $semuaPesan = Hubungi::all();
        return view('adminpesan', [
            'hubungis' => $semuaPesan,
        ]);
    }

    public function halamanhubungi() {
        // Menampilkan view 'hubungi'
        return view('hubungi');
    }

    public function destroy($nama)
    {    
        // Mencari data berdasarkan nama dan mengambil data pertama yang ditemukan
        $hubungi = Hubungi::where('nama', $nama)->first();
    
        // Memeriksa apakah objek 'hubungi' tidak null
        if ($hubungi) {
            // Menghapus objek 'hubungi' dari database
            $hubungi->delete();
        }
    
        // Mengarahkan kembali ke halaman 'adminpesan' setelah operasi penghapusan
        return redirect()->route('adminpesan');
    }

    public function hubungi(Request $request)
    {
        // Membuat instance baru dari model Hubungi
        $hubungi = new Hubungi();

        // Mengisi data model Hubungi dengan data yang diterima dari request
        $hubungi->nama = $request->nama;
        $hubungi->email = $request->email;
        $hubungi->pesan = $request->pesan;

        // Menyimpan model Hubungi ke dalam database
        $hubungi->save();

        // Menyimpan pesan informasi ke dalam session
        session()->flash('info', 'Pesan Anda telah berhasil dikirim.');

        // Mengarahkan kembali ke halaman 'hubungi'
        return redirect()->route('hubungi');
    }
}


