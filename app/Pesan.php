<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $guarded = [];

    public function isipesan()
    {
        return $this->hasMany('App\Isipesan');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Siswa');
    }

    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }
}
