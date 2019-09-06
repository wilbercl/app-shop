<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class TestController extends Controller
{
    public function welcome()
    {
    	//el metodo has() se encarga de verificar la existencia de una relacion (categoria - producto)
    	$categories = Category::has('products')->get();
    	return view('welcome')->with(compact('categories'));
    }
    
}
