<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carl extends Model
{
    public function details()
    {
    	return $this->hasMany(CarlDetail::class);
    }

    public function GetTotalAttribute()
    {
    	$total = 0;
    	foreach ($this->details as $detail) {
    		$total+= $detail->quantity * $detail->product->price;
    	}

    	return $total;
    }
}
