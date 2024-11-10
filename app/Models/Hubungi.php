<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Hubungi extends Model
{
    protected $primaryKey = 'nama'; // Tentukan 'nama' sebagai kunci utama
    public $incrementing = false;
    
    public function HubungiClass()
    {
        return $this->belongsTo(Hubungi::class);
    }

    public $timestamps = false;
}
