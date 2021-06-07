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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// route patrie admin


Route::get('/profile/{id}/edit',[App\Http\Controllers\AdminController::class, 'edit']);

Route::PUT('/profile/{id}',[App\Http\Controllers\AdminController::class, 'update']);

Route::get('/dashboard',  function(){
    return view('admin\dashboard');
} );

Route::get('/consultation',  function(){
    return view('admin\consultation');
} );

Route::get('/rendez',  function(){
    return view('admin\rendez');
} );

Route::get('/reception',  function(){
    return view('admin\reception');
} );






