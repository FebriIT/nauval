<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Isipesan extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->morphTo();
    }
}