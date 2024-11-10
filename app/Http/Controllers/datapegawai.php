<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Tambahkan model User

class datapegawai extends Controller
{
    public function index()
    {
        return view('datapegawai');
    }
    public function create(Request $request)
    {
        $pegawai = new User;
        $pegawai->nama = $request->nama;
        $pegawai->email = $request->email;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->role = 'pegawai';
        $pegawai->save();

        return redirect('/datapegawai')->with('success', 'Pegawai baru berhasil ditambahkan');
    }

    public function read()
    {
        $pegawai = User::where('role', 'pegawai')->get();
        return view('datapegawai', compact('pegawai'));
    }

    public function edit($id)
    {
        $pegawai = User::find($id);
        return view('editpegawai', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $pegawai = User::find($id);
        $pegawai->username = $request->username;
        $pegawai->email = $request->email;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->save();

        return redirect('/datapegawai')->with('success', 'Data pegawai berhasil diperbarui');
    }

    public function delete($id)
    {
        $pegawai = User::find($id);
        $pegawai->delete();

        return redirect('/datapegawai')->with('success', 'Pegawai berhasil dihapus');
    }
}
