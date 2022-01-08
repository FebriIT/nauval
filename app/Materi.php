<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany('\App\User', 'materi_id');
    }
}