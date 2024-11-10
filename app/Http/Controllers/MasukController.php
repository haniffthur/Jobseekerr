<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Hubungi;
use App\Models\Pekerjaan;
use App\Models\Karyawan;

class MasukController extends Controller
{
    public function halamanLogin() {
        return view('login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            switch ($user->role) {
                case 'Admin':
                    return redirect()->intended('/admin');
                case 'Pegawai':
                    return redirect()->intended('/pegawai');
                case 'Pencaker':
                    return redirect()->intended('/pencaker');
            }
        }
        return redirect()->route('login')->with('gagal', 'Data tidak ditemukan');
    }

    public function halamanLoginPerusahaan() {
        return view('loginperusahaan');
    }
    public function loginperusahaan(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect()->intended('/perusahaan');
        }
        return back()->withErrors([
            'gagal' => "Maaf username atau Password anda salah",
        ])->onlyInput('username');
    }
    public function halamanAdmin() {
        $jumlahPekerjaan = Pekerjaan::count();
        return view('homeadmin', [
            'jumlah_pekerjaan' => $jumlahPekerjaan,
            'jumlah_karyawan' => Karyawan::where('status', 'Aktif')->count(),
            'jumlah_pesan' => Hubungi::count(),

        ]);
    }
    public function halamanPegawai() {
        $jumlahPekerjaan = Pekerjaan::count();
        return view('homepegawai', [
            'jumlah_pekerjaan' => $jumlahPekerjaan
        ]);
    }
    public function halamanPencaker() {
        
        return view('homepencaker', [
            'data_pekerjaan' => Pekerjaan::get(),
            
        ]);
    }
    public function halamanPerusahaan() {
        return view('homeperusahaan');
    }
}
