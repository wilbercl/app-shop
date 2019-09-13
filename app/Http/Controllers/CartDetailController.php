<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarlDetail;
use App\Carl;

class CartDetailController extends Controller
{
    public function store(Request $request)
    {
        $cartDetail = CarlDetail::where('product_id', $request->product_id)->get();
        if($cartDetail){
            foreach ($cartDetail as $detail) {
                $cart = Carl::find($detail->carl_id);
                if($cart->status=="Active"){
                    $notification = 'The product is already loaded in your current shopping cart.';

                    return back()->with(compact('notification'));
                }
            }      
        }
        
    	$cartDetail = new CarlDetail();
    	$cartDetail->carl_id = auth()->user()->cart->id;
    	$cartDetail->product_id = $request->product_id;
    	$cartDetail->quantity = $request->quantity;
        $cartDetail->price = $request->price;
    	$cartDetail->save();

    	$notification = 'The product has been successfully loaded into your shopping cart.';
        

    	return back()->with(compact('notification'));
    }

    public function delete(Request $request)
    {
    	$cartDetail = CarlDetail::find($request->id);

    	if ($cartDetail->carl_id == auth()->user()->cart->id) {
    		$cartDetail->delete();
    		$notification = 'The product has been successfully removed from the shopping cart.';
    	}
    	else {
    		$notification = 'The product has not been removed from the shopping cart.';
    	}

    	return back()->with(compact('notification'));
    }

    public function edit(Request $request)
    {
        $cartDetail = CarlDetail::find($request->id);
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();
        $notification = 'The product detail has been edited correctly.';
        
        return back()->with(compact('notification'));
    }
}
