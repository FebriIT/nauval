<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugasygdikerjakan extends Model
{
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo('\App\Siswa');
    }
}
