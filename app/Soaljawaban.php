<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soaljawaban extends Model
{
    protected $guarded = [];

    public function Soal()
    {
        return $this->belongsTo('\App\Soal')->withDefault();
    }
}