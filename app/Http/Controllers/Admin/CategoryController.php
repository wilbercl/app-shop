<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('name')->paginate(10);
    	return view('admin.categories.index')->with(compact('categories'));
    }

    public function create()
    {
    	return view('admin.categories.create');
    }

    public function store(Request $request)
    {
    	/*//imprimir el pedido post en la web
    	dd($request->all());*/

    	$this->validate($request, Category::$rules, Category::$messages);

        //otra manera de crear una categoria, pero esta es de manera "mass assignment". 
    	Category::create($request->all());

    	$notification = 'The category was created correctly.';

    	return redirect('/admin/categories')->with(compact('notification'));
    }

    public function edit(Category $category)
    {
    	return view('admin.categories.edit')->with(compact("category"));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, Category::$rules, Category::$messages);

        $category->update($request->all());

    	$notification = 'The category was updated correctly.';

    	return redirect('/admin/categories')->with(compact('notification'));
    }

    public function delete(Category $category)
    {
    	$category->delete();

    	$notification = 'The category was deleted correctly.';
    	return back()->with(compact('notification'));//retorna a la pagina anterior
    }
}
