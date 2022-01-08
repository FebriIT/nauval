<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswaguru extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany('\App\User', 'siswaguru_id');
    }
}