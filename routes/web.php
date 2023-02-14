<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes(['register' => true, 'verify' => true, 'login' => false]);

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::group(['prefix' => '', 'middleware' => 'verified'], function () {
    Route::group(['prefix' => 'book'], function () {
        Route::get('/', 'BookController@index')->name('book.list');
        Route::get('/create', 'BookController@create')->name('book.create');
        Route::get('/{book}/edit', 'BookController@edit')->name('book.edit')->where('id', '[0-9]+');
        Route::post('/', 'BookController@store')->name('book.store');  
        Route::put('/update/{book}', 'BookController@update')->name('book.update')->where('id', '[0-9]+');
        Route::delete('/delete/{book}', 'BookController@destroy')->name('book.destroy')->where('id', '[0-9]+');
        Route::get('/show/{book}', 'BookController@show')->name('book.show')->where('id', '[0-9]+');
        Route::get('/bookDetails/{book}', 'BookController@bookDetails')->name('book.details')->where('id', '[0-9]+');

    });

});