<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/search', 'SearchController@show');//hacer una busqueda
Route::get('/products/json', 'SearchController@data');//devolver arreglo con los nombres de los productos

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');//mostrar producto

Route::get('/categories/{category}', 'CategoryController@show');//mostrar categoria

Route::post('/cart', 'CartDetailController@store');//añadir un carrito de compra
Route::delete('/cart', 'CartDetailController@delete');//eliminar un detalle(producto seleccionado) de un carrito de compra
Route::put('/cart', 'CartDetailController@edit');//editar la cantidad de productos que se desea añadir al carrito de compra.

Route::post('/order', 'CartController@update');//añadir una orden de compra

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/products', 'ProductController@index');//listado
	Route::get('/products/create', 'ProductController@create');//formulario create
	Route::post('/products', 'ProductController@store');//registrar 
	Route::get('/products/{id}/edit', 'ProductController@edit');//formulario editar
	Route::post('/products/{id}/edit', 'ProductController@update');//editar formulario
	Route::post('/products/{id}/delete', 'ProductController@delete');//eliminar 

	Route::get('/products/{id}/images', 'ImageController@index'); //listado de imagenes del producto
	Route::post('/products/{id}/images', 'ImageController@store');//registrar la nueva imagen
	Route::delete('/products/{id}/images', 'ImageController@delete');//registrar la nueva imagen
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); //listado de imagenes del producto

	Route::get('/categories', 'CategoryController@index');//listado
	Route::get('/categories/create', 'CategoryController@create');//formulario create
	Route::post('/categories', 'CategoryController@store');//registrar 
	Route::get('/categories/{category}/edit', 'CategoryController@edit');//formulario editar
	Route::post('/categories/{category}/edit', 'CategoryController@update');//editar formulario
	Route::post('/categories/{category}/delete', 'CategoryController@delete');//eliminar 
});
