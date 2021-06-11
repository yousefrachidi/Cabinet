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
//user routes------------------------
Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('user.login');
});

Route::get('/register', function () {
    return view('user.register');
});
Route::get('/consult', function () {
    return view('user.consultation');
});
Route::get('/profile', function () {
    return view('user.profile');
});
Route::get('/user', function () {
    return view('user.utilisateur');
});
//------------------------------------

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// route patrie admin


Route::get('/profile/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit']);

Route::PUT('/profile/{id}', [App\Http\Controllers\AdminController::class, 'update']);

Route::get('/dashboard',  function () {
    return view('admin\dashboard');
});

Route::get('/consultation',  function () {
    return view('admin\consultation');
});

Route::get('/rendez',  function () {
    return view('admin\rendez');
});

Route::get('/reception', [App\Http\Controllers\ReceptionController::class, 'index']);

Route::post('/reception', [App\Http\Controllers\ReceptionController::class, 'store']);

Route::get('/reception/{status}/{id}', [App\Http\Controllers\ReceptionController::class, 'update']);

Route::resource('medicament', App\Http\Controllers\MedicamentController::class);
