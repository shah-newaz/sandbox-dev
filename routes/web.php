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

Route::get("/", "SandboxController@getSandbox")->name("home");

Route::middleware('auth')->group(function () {

	Route::get("/products", "ProductsController@index")->name("product.index");
	Route::get("/product/new", "ProductsController@form")->name("product.new");
	Route::get("/product/edit/{product}", "ProductsController@form")->name("product.edit");
	Route::post("/product/delete/{product}", "ProductsController@delete")->name("product.delete");
	Route::post("/product/new", "ProductsController@post")->name("product.save");

	Route::get("/categories", "CategoriesController@index")->name("category.index");
	Route::get("/category/new", "CategoriesController@form")->name("category.new");
	Route::get("/category/edit/{category}", "CategoriesController@form")->name("category.edit");
	Route::post("/category/delete/{category}", "CategoriesController@delete")->name("category.delete");
	Route::post("/category/new", "CategoriesController@post")->name("category.save");

});



Route::get('/register', 'UsersController@registerForm')->name('user.register');
Route::post('/register', 'UsersController@register')->name('user.register.post');

Route::get('/login', 'UsersController@loginForm')->name('login');
Route::get('/logout', 'UsersController@logout')->name('user.logout');
Route::post('/login', 'UsersController@login')->name('user.login.post');