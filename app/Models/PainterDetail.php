<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PainterDetail extends Model
{
    protected $table = 'painter_details';

    public function depot()
    {
    	return $this->belongsTo(Depot::class, 'depot_id');
    }

    public function product()
    {
    	return $this->belongsTo(Product::class, 'product_id');
    }

    public function dealer()
    {
    	return $this->belongsTo(Dealer::class, 'dealer_id');
    }
}
