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

Route::view('/',  'auth.login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth Routes
Route::group(['middleware' => 'auth'], function(){

    //Shared Routes
    Route::resource('complaints', \App\Http\Controllers\ComplaintController::class);

    //Admin Routes
    Route::group(['prefix' => 'admin','middleware'=>'role:Admin'], function(){
        Route::view('dashboard', 'admin.index')->name('admin.index');
        Route::resource('patients', \App\Http\Controllers\PatientController::class);
        Route::resource('doctors', \App\Http\Controllers\DoctorController::class);

    });

    //Doctor Routes
    Route::group(['prefix' => 'doctor', 'middleware'=>'role:Doctor'], function(){
        Route::view('dashboard', 'doctor.index')->name('doctor.index');
        Route::get('patients', [\App\Http\Controllers\PatientController::class, 'index'])->name('doctor.patients.index');
    });

    //Patient Routes
    Route::group(['prefix' => 'patient', 'middleware'=>'role:Patient'], function(){
        Route::view('dashboard', 'patient.index')->name('patient.index');
    });

});

//Test routes
Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
Route::get('/blank', [App\Http\Controllers\HomeController::class, 'blank'])->name('blank');

