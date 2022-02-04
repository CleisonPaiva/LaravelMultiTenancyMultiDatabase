<?php

use App\Http\Controllers\Tenant\CompanyController;
use App\Http\Controllers\Tenant\TenantController;
//
Route::get('company/datatable', [CompanyController::class,'datatable']);
Route::resource('company', CompanyController::class);
//
//Route::get('companies', 'Tenant\CompanyController@index')->name('company.index');
//Route::get('company/create', 'Tenant\CompanyController@create')->name('company.create');
//Route::post('company', [CompanyController::class,'store'])->name('company.store');
//Route::get('company/{domain}', 'Tenant\CompanyController@show')->name('company.show');
//Route::get('company/edit/{domain}', 'Tenant\CompanyController@edit')->name('company.edit');
//Route::put('company/{id}', 'Tenant\CompanyController@update')->name('company.update');
//Route::delete('company/{id}', 'Tenant\CompanyController@destroy')->name('company.destroy');
//
//Route::get('/', 'Tenant\TenantController@index')->name('tenant');
