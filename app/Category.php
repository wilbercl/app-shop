<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	//validar
	public static $messages= [
			'name.required' => 'You need to enter a name for the category.',
			'name.min' => 'The category name must have at least 3 characters.',
            'description.max' => 'La descripcion corta solo admite hasta 250 caracteres.'
		];

	public static $rules = [
            'name' => 'required|min:3',
            'description' => 'max:250'
        ];

	protected $fillable = ['name', 'description'];

    //$category->products
    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
