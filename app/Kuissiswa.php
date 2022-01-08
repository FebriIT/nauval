<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuissiswa extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany('\App\User', 'kuissiswa_id');
    }

    public function siswa()
    {
        return $this->belongsTo('\App\Siswa');
    }

    public function kuis()
    {
        return $this->belongsTo('\App\Kuis');
    }

    public function soaljawaban()
    {
        return $this->hasMany('\App\Soaljawaban');
    }
}
