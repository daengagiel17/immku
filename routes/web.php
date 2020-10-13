<?php

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

// Auth
Auth::routes();

// Admin
Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('activity', 'DashboardController@activity')->name('activity.index');
Route::get('profile', 'ProfileController@show')->name('profile.show');
Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::put('profile/edit', 'ProfileController@update')->name('profile.update');

// Kelola berita, dokumen
Route::resource('berita', 'BeritaController');
Route::resource('dokumen', 'DokumenController')->except('show');