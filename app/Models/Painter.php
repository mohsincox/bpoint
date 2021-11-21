<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Painter extends Model
{
    protected $table = 'painters';

    public function painterDetails()
    {
        return $this->hasMany('App\Models\PainterDetail', 'painter_id');
    }
}
