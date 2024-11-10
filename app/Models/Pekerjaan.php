<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    public $timestamps = false;
    protected $table='pekerjaan';
    protected $primaryKey = 'id_pekerjaan';
    public function pekerjaan(){
        return $this->belongsTo(Pekerjaan::class);
    }
}
