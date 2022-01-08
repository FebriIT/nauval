<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany('\App\User', 'kuis_id');
    }

    public function kuissiswa()
    {
        return $this->hasMany('\App\Kuissiswa');
    }

    public function soals()
    {
        return $this->hasMany('\App\Soal');
    }

    public function guru()
    {
        return $this->belongsTo('\App\Guru', 'nip', 'id');
    }
}
