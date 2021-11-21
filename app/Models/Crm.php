<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crm extends Model
{
    protected $table = 'crms';

    public function district()
    {
    	return $this->belongsTo(District::class, 'district_id');
    }

    public function depot()
    {
    	return $this->belongsTo(Depot::class, 'depot_id');
    }
}
