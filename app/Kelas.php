<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $guarded = [];
    public function admin()
    {
        return $this->hasMany('\App\Admin', 'kelas_id');
    }
}