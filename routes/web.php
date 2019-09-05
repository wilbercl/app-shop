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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');//mostrar producto

Route::post('/cart', 'CartDetailController@store');//añadir un carrito de compra
Route::delete('/cart', 'CartDetailController@delete');//eliminar un detalle(producto seleccionado) de un carrito de compra

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
});
