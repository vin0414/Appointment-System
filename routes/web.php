<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Files;
use App\Http\Controllers\Export;
use App\Http\Controllers\Authentication;
//save the applicant data
Route::post('applicant/save',[Files::class,'saveApplicant'])->name('applicant/save');
Route::get('/logout',[Authentication::class,'logout'])->name('logout');
Route::middleware('guest')->group(function ()
{
    Route::get('/', [Home::class,'index'])->name('/');
    Route::get('login', [Home::class,'login'])->name('login');
    Route::post('sign-in',[Authentication::class,'Authenticate'])->name('sign-in');
});
Route::middleware(['auth','prevent'])->group(function(){
    Route::get('dashboard', [Home::class,'dashboard'])->name('dashboard');
    //schools
    Route::get('schools', [Home::class,'allSchools'])->name('schools');
    Route::get('schools/create', [Home::class,'addSchool'])->name('schools/create');
    Route::get('schools/edit/{id}', [Home::class,'editSchool'])->name('schools/edit');
    //records
    Route::get('records', [Home::class,'allRecords'])->name('records');
    Route::get('records/edit/{id}', [Home::class,'editRecord'])->name('records/edit');
    Route::get('records/view/{id}', [Home::class,'viewRecord'])->name('records/view');
    //maintenance
    Route::get('maintenance/recovery', [Home::class,'recovery'])->name('maintenance/recovery');
    Route::get('maintenance/accounts', [Home::class,'accounts'])->name('maintenance/accounts');
    Route::get('maintenance/settings', [Home::class,'settings'])->name('maintenance/settings');
    Route::get('profile', [Home::class,'profile'])->name('profile');
    //ajax
    Route::post('schools/save', [Files::class,'saveSchool'])->name('schools/save');
    Route::post('schools/update', [Files::class,'updateSchool'])->name('schools/update');
    Route::post('records/assign', [Files::class,'assignApplicant'])->name('records/assign');
    //export
    Route::get('export/form/32/{id}',[Export::class,'exportForm32'])->name('export/form/32');
    Route::get('export/form/4/{id}',[Export::class,'exportForm4'])->name('export/form/4');
    Route::get('export/form/1/{id}',[Export::class,'exportForm1'])->name('export/form/1');
    Route::get('export/form/33/B/{id}',[Export::class,'exportForm33B'])->name('export/form/33/B');
});
