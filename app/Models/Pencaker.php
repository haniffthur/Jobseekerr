<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lowongan;

class Pencaker extends Model
{
    protected $table = 'pencaker';
    protected $primaryKey = 'id_pencaker';
    protected $fillable = [
        'id_pencaker','perusahaan_id','lowongan_id','nama','gender','email', 'cv',
        ];
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}
