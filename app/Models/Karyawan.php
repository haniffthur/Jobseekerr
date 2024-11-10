<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [ 'id_pegawai','nik', 'nama', 'email','tgl_lahir', 'jenis_kelamin','agama','alamat','no_telpon', 'status',];

    public function pegawai()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
