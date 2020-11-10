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

Route::get('/home', 'GuestController@index')->name('welcome');


Auth::routes();

Route::get('/mis-entradas', 'HomeController@index')->name('home');
Route::get('/entries/{entry}', 'GuestController@show')->name('entradas');

//Route::get('/login', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/entries/create', 'EntryController@create')->name('create-entry');
    Route::get('/users/{user}', 'UserController@show')->name('user');
    Route::get('/entries/{entry}/edit', 'EntryController@edit')->name('entradas-edit');
    Route::post('/entries', 'EntryController@store')->name('enviar-publicacion');
    Route::put('/entries/{entry}', 'EntryController@update')->name('enviar-publicacion');
});