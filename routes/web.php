<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/apropos', function () {
    return view('apropos');
});
Route::get('/services', function () {
    return view('service');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/connection', function () {
    return view('connecterpatient');
});
Route::get('/inscription', function () {
    return view('inscription');
});
//Inscription et connection patient
Route::post('/inscription', [PatientController::class, 'register']);
Route::post('/connection', [PatientController::class, 'login']);
// Voir liste des medecin
Route::get('/show/medecins', [PatientController::class, 'showmedecins']);
Route::get('/demanderrendezvous', [PatientController::class, 'demanderrendez']);
Route::post('/demanderrendezvous/{medecins}', [PatientController::class, 'enregstrerrendez']);
Route::get('/show/emploidutemps/medecins', [PatientController::class, 'showemploi']);

Route::get('/demanderHospitalisation', [PatientController::class, 'demanderHospitalisation']);
Route::post('/demanderHospitalisation/{medecins}', [PatientController::class, 'enregstrerHospitalisation']);
