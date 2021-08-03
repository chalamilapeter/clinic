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
    Route::resource('diagnosis', \App\Http\Controllers\DiagnosisController::class);
    Route::resource('lab_results', \App\Http\Controllers\LabResultController::class);
    Route::get('lab_results_download/{id}', [\App\Http\Controllers\LabResultController::class, 'download'])->name('download.lab-result');
    Route::resource('results', \App\Http\Controllers\ResultControler::class);

    //Admin Routes
    Route::group(['prefix' => 'admin','middleware'=>'role:Admin'], function(){
        Route::view('dashboard', 'admin.index')->name('admin.index');
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('patients', \App\Http\Controllers\PatientController::class);
        Route::resource('doctors', \App\Http\Controllers\DoctorController::class);
        Route::resource('diseases', \App\Http\Controllers\Admin\DiseaseController::class);
        Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
        Route::resource('labs', \App\Http\Controllers\Admin\LabController::class);
        Route::resource('lab_technicians', \App\Http\Controllers\Admin\LabTechnicianController::class);
        Route::resource('pharmacies', \App\Http\Controllers\Admin\PharmacyController::class);
        Route::resource('pharmacists', \App\Http\Controllers\Admin\PharmacistController::class);

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

    //Lab Technician Routes
    Route::group(['middleware' => 'role:Lab Technician'], function(){
        Route::resource('lab_tech', \App\Http\Controllers\LabTechnician\LabTechnicianController::class);
    });

});

//Test routes
Route::get('/blank', [App\Http\Controllers\HomeController::class, 'blank'])->name('blank');

