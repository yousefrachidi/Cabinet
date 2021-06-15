<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

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
//User routes--------------------------

Route::get('/', function () {
    return view('home');
});


Route::get('/consult', function () {
    return view('user.consultation');
});



Route::get('/user', function () {
    return view('user.utilisateur');
});



Route::post('/save', [PatientController::class, 'save'])->name('save');
Route::post('/check', [PatientController::class, 'check'])->name('check');
Route::get('/logout', [PatientController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['authentification']], function () {
    Route::get('/login', [PatientController::class, 'login'])->name('login');
    Route::get('/register', [PatientController::class, 'register'])->name('register');
    Route::get('/mon_profile', [PatientController::class, 'monProfile'])->name('monprofile');
    Route::get('/user', [PatientController::class, 'monstatus'])->name('monstatus');
});

// route patrie admin-------------------------------------------------------------------


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

Route::get('/patient', [App\Http\Controllers\PatientController::class, 'index']);

Route::get('/patient/{cin}', [App\Http\Controllers\PatientController::class, 'show']); 


Route::post('/ordonnance', [App\Http\Controllers\OrdonnanceController::class, 'store']);

/* tooooooooooooooooooooooooooooo test */

Route::get('/test', function(){
    return view('admin.ordtest');
});