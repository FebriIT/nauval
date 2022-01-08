<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'akses',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }
    public function guru()
    {
        return $this->hasOne(Guru::class);
    }
    public function getProfil()
    {
        if (!$this->profil) {
            return asset('images/default.png');
        }
        return asset('images/' . $this->profil);
    }
}