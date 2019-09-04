<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarlDetail extends Model
{
	//CartDetail N             1 Product
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

}
