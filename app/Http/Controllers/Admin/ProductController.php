<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
    	return view('admin.products.create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
    	/*//imprimir el pedido post en la web
    	dd($request->all());*/

        //validate
        $messages= [
            'name.required' => 'You need to enter a name for the product.',
            'name.min' => 'The product name must have at least 3 characters.',
            'description.required' => 'La descripcion corta es obligatoria.',
            'description.max' => 'La descripcion corta solo admite hasta 200 caracteres.',
            'price.required' => 'Es obligatorio un precio para el producto.',
            'price.min' => 'No se admiten valores negativos.',
            'price.numeric' => 'Ingrese un precio válido.',
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|min:0|numeric'
        ];

        $this->validate($request, $rules, $messages);

    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;

    	$product->save();
    	return redirect('/admin/products');
    }

    public function edit($id)
    {
    	$product = Product::find($id);
        $categories = Category::orderBy('name')->get();
    	return view('admin.products.edit')->with(compact("product", 'categories'));
    }

    public function update(Request $request, $id)
    {
        //validate
        $messages= [
            'name.required' => 'You need to enter a name for the product.',
            'name.min' => 'The product name must have at least 3 characters.',
            'description.required' => 'La descripcion corta es obligatoria.',
            'description.max' => 'La descripcion corta solo admite hasta 200 caracteres.',
            'price.required' => 'Es obligatorio un precio para el producto.',
            'price.min' => 'No se admiten valores negativos.',
            'price.numeric' => 'Ingrese un precio válido.',
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|min:0|numeric'
        ];

        $this->validate($request, $rules, $messages);
        
    	$product = Product::find($id);

    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;

    	$product->save();
    	return redirect('/admin/products');
    }

    public function delete($id)
    {
    	$product = Product::find($id);
    	$product->delete();

    	return back();//retorna a la pagina anterior
    }
}
