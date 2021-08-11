<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','HomeController@index')->name('home');
Route::get('/login','LoginController@index')->name('logins');
Route::get('/register','RegisterController@index')->name('register');
Route::get('/editUser','EditUserController@index')->name('editUser');
Route::get('/createProduct','CreateProductController@index')->name('createProduct');
Route::get('/editProduct','EditProductController@index')->name('editProduct');
Route::get('/editQuantity','EditQuantityController@index')->name('editQuantity');
Route::get('/changePassword','ChangePasswordController@index')->name('changePassword');
Route::get('/inventoryFlows','InventoryFlowsController@index')->name('inventoryFlows');

Route::get('/logout','LoginController@logOut');
Route::post('/login','LoginController@authenticate');
Route::put('/editUser','EditUserController@edit');