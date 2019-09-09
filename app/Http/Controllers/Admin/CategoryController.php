<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use File;

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

        //otra manera de crear una categoria, pero esta es de manera "mass assignment", pero solo con los campos 'name' y 'description'. 
    	$category = Category::create($request->only('name', 'description'));

        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = public_path() . '/images/categories'; //ruta donde estara la nueva imagen almacenada
            $filename = uniqid() . '-' . $file->getClientOriginalName(); //nombre que se le dara a la imagen seleccionada (id unico + nombre del archivo)
            $move = $file->move($path, $filename); //ordenar al archivo que se guarde en la ruta $path con el nombre $filename

            //actualizamos la categoria con la imagen
            if($move){
                $category->image=$filename;          
                $category->save();
            }
        }

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

        $category->update($request->only('name', 'description'));

        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = public_path() . '/images/categories'; //ruta donde estara la nueva imagen almacenada
            $filename = uniqid() . '-' . $file->getClientOriginalName(); //nombre que se le dara a la imagen seleccionada (id unico + nombre del archivo)
            $move = $file->move($path, $filename); //ordenar al archivo que se guarde en la ruta $path con el nombre $filename

            //actualizamos la categoria con la imagen
            if($move){
                $previousPath = $path . '/' . $category->image;
                
                $category->image=$filename;          
                $save = $category->save();

                if($save)
                    File::delete($previousPath);
            }
        }

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
