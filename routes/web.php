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

Route::get('/prueba', function () {
    return 'Hola soy una ruta de prueba';
});

Route::get('/', 'TestController@welcome');
Route::get('/ayuda', 'IntranetController@ayuda');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('products/{id}', 'ProductController@show')->name('product.show');

Route::post('cart', 'CartDetailController@store')->name('cart.store');
Route::delete('cart', 'CartDetailController@destroy');
Route::post('order', 'CartController@update')->name('cart.update');

Route::middleware(['auth','admin'])->group(function () {
	Route::get('/admin/products', 'Admin\ProductController@index'); // listado
	Route::get('/admin/products/create', 'Admin\ProductController@create'); // formulario
	Route::post('/admin/products', 'Admin\ProductController@store'); // registrar
	Route::get('/admin/products/{id}/edit', 'Admin\ProductController@edit'); // formulario edición
	Route::post('/admin/products/{id}/edit', 'Admin\ProductController@update'); // actualizar
	Route::delete('/admin/products/{id}', 'Admin\ProductController@destroy'); // form eliminar

	// Imágenes
	Route::get('/admin/products/{id}/images', 'Admin\ImageController@index');  //Listado
	Route::post('/admin/products/{id}/images', 'Admin\ImageController@store'); //Registrar
	Route::delete('/admin/products/{id}/images', 'Admin\ImageController@destroy'); //Eliminar
	Route::get('/admin/products/{id}/images/select/{image}', 'Admin\ImageController@select'); //Destacar	
});

