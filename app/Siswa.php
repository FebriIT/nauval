<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [];
    public function admin()
    {
        return $this->hasMany('\App\Admin', 'siswa_id');
    }
    public function getProfil()
    {
        if (!$this->profil) {
            return asset('images/default.png');
        }
        return asset('images/' . $this->profil);
    }
    public function isipesan()
    {
        $this->morphOne('App\Isipesan', 'user');
    }
}