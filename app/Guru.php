<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $guarded = [];
    public function admin()
    {
        return $this->hasMany('\App\Admin', 'guru_id');
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