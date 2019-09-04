<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carl extends Model
{
    public function details()
    {
    	return $this->hasMany(CarlDetail::class);
    }
}
