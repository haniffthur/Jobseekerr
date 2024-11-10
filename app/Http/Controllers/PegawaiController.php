<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class PegawaiController extends Controller
{
    public function index()
    {
       return view('karyawan',[
        'data_karyawan' => Karyawan::all()
       ]);
    }
    public function actionPegawai(Request $request)
    {
        $pegawai = Karyawan::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email'=> $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_telpon' => $request->no_telpon,
            'status' => $request->status,
            'updated_at' => now(),
            'created_at' => now()
        ]);
        return redirect('/karyawan')->with('success','Data Pegawai Berhasil Ditambahkan');
    }
    public function edit($id_pegawai)
    {
        $pegawai = Karyawan::find($id_pegawai);
        return view('karyawan.edit',compact('pegawai'));
    }
    public function update(Request $request, $id_pegawai)
    {
        $pegawai = Karyawan::find($id_pegawai);
        $pegawai->nama = $request->nama;
        $pegawai->email = $request->email;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->agama = $request->agama;
        $pegawai->tgl_lahir = $request->tgl_lahir;
        $pegawai->alamat = $request->alamat;
        $pegawai->no_telpon = $request->no_telpon;
        $pegawai->status = $request->status;
        $pegawai->save();
        return redirect('/karyawan')->with('success','Data Pegawai Berhasil Diubah');
    }
    public function delete($id_pegawai)
    {
        Karyawan::destroy($id_pegawai);
        return redirect('/karyawan')->with('success','Data Pegawai Berhasil Dihapus');
    }
}
