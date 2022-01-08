<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany('\App\User', 'tugas_id');
    }

    public function tugasygdikerjakan()
    {
        return $this->hasMany('\App\Tugasygdikerjakan');
    }

    public function guru()
    {
        return $this->belongsTo('\App\Guru', 'nip', 'id');
    }
}
