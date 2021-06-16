<?php

use App\Http\Controllers\HomeController;
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





Route::get('/user', function () {
    return view('user.utilisateur');
});



Route::post('/save', [PatientController::class, 'save'])->name('save');
Route::post('/check', [PatientController::class, 'check'])->name('check');
Route::get('/logout', [PatientController::class, 'logout'])->name('logout');
Route::post('/modifier', [PatientController::class, 'updatePatient'])->name('modifierCompte');
Route::post('/send', [HomeController::class, 'send'])->name('contactus');
Route::post('/rendezvous', [HomeController::class, 'rendezvous'])->name('rendezvous');

Route::group(['middleware' => ['authentification']], function () {
    Route::get('/login', [PatientController::class, 'login'])->name('login');
    Route::get('/register', [PatientController::class, 'register'])->name('register');
    Route::get('/mon_profile', [PatientController::class, 'monProfile'])->name('monprofile');
    Route::get('/user', [PatientController::class, 'monstatus'])->name('monstatus');
    Route::get('/consult', [PatientController::class, 'consult'])->name('consult');
});






// route partie admin-------------------------------------------------------------------

Route::post('/save', [PatientController::class, 'save'])->name('save');
Route::post('/check', [PatientController::class, 'check'])->name('check');
Route::get('/logout', [PatientController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['authentification']], function () {
    Route::get('/login', [PatientController::class, 'login'])->name('login');
    Route::get('/register', [PatientController::class, 'register'])->name('register');
    Route::get('/mon_profile', [PatientController::class, 'monProfile'])->name('monprofile');
    Route::get('/user', [PatientController::class, 'monstatus'])->name('monstatus');
});



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

//Route::get('/patient/{cin}', [App\Http\Controllers\PatientController::class, 'show']); 

Route::get('/pdf/{path}/', [App\Http\Controllers\OrdonnanceController::class, 'downloadPDF']);

Route::get('/view/{path}/', [App\Http\Controllers\OrdonnanceController::class, 'viewPDF']);
