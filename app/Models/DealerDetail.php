<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealerDetail extends Model
{
    protected $table = 'dealer_details';

    public function depot()
    {
    	return $this->belongsTo(Depot::class, 'depot_id');
    }

    public function product()
    {
    	return $this->belongsTo(Product::class, 'product_id');
    }

    public function painter()
    {
    	return $this->belongsTo(Painter::class, 'painter_id');
    }
}
