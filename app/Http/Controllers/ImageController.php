<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    public function index($id)
    {
    	$product = Product::find($id);
    	$images = $product->images()->orderBy('featured', 'desc')->get();
    	return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    public function store(Request $request, $id)
    {
    	$file = $request->file('photo');
    	$path = public_path() . '/images/products'; //ruta donde estara la nueva imagen almacenada
    	$filename = uniqid() . $file->getClientOriginalName(); //nombre que se le dara a la imagen seleccionada (id unico + nombre del archivo)
    	$move = $file->move($path, $filename); //ordenar al archivo que se guarde en la ruta $path con el nombre $filename

    	if($move){
			$product_image = new ProductImage();
	    	$product_image->image = $filename;
	    	$product_image->product_id = $id;
	    	
	    	$product_image->save();
    	}

    	return back();
    }

    public function delete(Request $request, $id)
    {
    	//$productImages = ProductImage::find($request->image_id);//son equivalentes
    	$productImages = ProductImage::find($request->input("image_id"));


    	//$productImages = ProductImage::find($request->file("photo"));
    	if (substr($productImages->image, 0, 4) == "http"){
    		$deleted = true;
    	}
    	else{
    		$fullPath = public_path() . '/images/products/' . $productImages->image;
    		$deleted = File::delete($fullPath);
    	}

    	if($deleted){
    		$productImages->delete();
    	}
  	   		
    	return back();
    }

    public function select($id, $image)
    {
    	ProductImage::where('product_id', $id)->update([
    		'featured' => false
    		]);

    	$productImage = ProductImage::find($image);
    	$productImage->featured = true;
    	$productImage->save();
    	return back();
    }
}
