<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $table = 'dealers';

    public function dealerDetails()
    {
        return $this->hasMany('App\Models\DealerDetail', 'dealer_id');
    }
}
