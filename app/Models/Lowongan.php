<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    public $timestamps = false;
    protected $table='pekerjaan';
    protected $primaryKey = 'id_pekerjaan';
    
    protected $fillable = [
        'id_pekerjaan',
        'Perusaahaan',
        'judul',
        'deskripsi',
        'persyaratan',
        'lokasi',
        'gaji',
        'tgl_posting',
        'tgl_expired',
        'status',
    ];
    public function lowongan()
    {
        return $this->hasMany(Lowongan::class);
    }
}
