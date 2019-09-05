<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
    	$cart = auth()->user()->cart;
    	$cart->status = 'Pending';
    	$cart->save();

    	$notification = 'Your order has been successfully registered. We will contact you soon via mail!';
    	return back()->with(compact('notification'));
    }
}
