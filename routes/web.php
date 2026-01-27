<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Files;
use App\Http\Controllers\Export;
use App\Http\Controllers\Download;
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
    //reports
    Route::get('reports', [Home::class,'reports'])->name('reports');
    //maintenance
    Route::get('maintenance/recovery', [Home::class,'recovery'])->name('maintenance/recovery');
    Route::get('maintenance/accounts', [Home::class,'accounts'])->name('maintenance/accounts');
    Route::get('maintenance/accounts/create', [Home::class,'createAccount'])->name('maintenance/accounts/create');
    Route::get('maintenance/accounts/edit/{id}', [Home::class,'editAccount'])->name('maintenance/accounts/edit');
    Route::get('maintenance/settings', [Home::class,'settings'])->name('maintenance/settings');
    Route::get('profile', [Home::class,'profile'])->name('profile');
    //ajax
    Route::post('schools/save', [Files::class,'saveSchool'])->name('schools/save');
    Route::post('schools/update', [Files::class,'updateSchool'])->name('schools/update');
    Route::post('records/assign', [Files::class,'assignApplicant'])->name('records/assign');
    Route::post('records/save', [Files::class,'saveRecords'])->name('records/save');
    Route::post('records/update', [Files::class,'editRecords'])->name('records/update');
    Route::post('salary/save',[Files::class,'saveSalary'])->name('salary/save');
    Route::post('salary/edit',[Files::class,'editSalary'])->name('salary/edit');
    Route::get('salary/fetch',[Files::class,'fetchSalary'])->name('salary/fetch');
    Route::post('accounts/save', [Files::class,'saveAccount'])->name('accounts/save');
    Route::post('accounts/update', [Files::class,'editAccount'])->name('accounts/update');
    Route::post('accounts/reset',[Files::class,'resetAccount'])->name('accounts/reset');
    Route::post('accounts/password',[Files::class,'accountPassword'])->name('accounts/password');
    Route::get('reports/generate',[Files::class,'generateReport'])->name('reports/generate');
    //export
    Route::get('export/form/32/{id}',[Export::class,'exportForm32'])->name('export/form/32');
    Route::get('export/form/4/{id}',[Export::class,'exportForm4'])->name('export/form/4');
    Route::get('export/form/1/{id}',[Export::class,'exportForm1'])->name('export/form/1');
    Route::get('export/form/33/B/{id}',[Export::class,'exportForm33B'])->name('export/form/33/B');
    Route::get('download',[Download::class,'downloadFile'])->name('download');
    Route::get('records/download',[Download::class,'downloadRecords'])->name('records/download');
});