<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

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
Route::post( '/connections',[PatientController::class,'register']) ;
Route::get('/test', function () {
    return 'connecterpatient';
});