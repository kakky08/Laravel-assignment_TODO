<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'state',
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
