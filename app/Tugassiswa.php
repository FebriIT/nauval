<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugassiswa extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany('\App\User', 'tugassiswa_id');
    }
}