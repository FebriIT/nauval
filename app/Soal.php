<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $guarded = [];

    public function Soaljawaban()
    {
        return $this->belongsTo('\App\Soaljawaban')->withDefault();
    }
}