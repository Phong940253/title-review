<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
Route::get('/info', function() {
    return phpinfo();
});

Auth::routes();
//Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'App\Http\Controllers\ProfileController@edit')->name('home')->middleware('select.title');
    Route::get('/home', 'App\Http\Controllers\ProfileController@edit')->name('home')->middleware('select.title');
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);

    Route::get('object/get_by_title', 'App\Http\Controllers\SelectTitleController@get_by_title')->name('user.object.get_by_title');
    Route::get('select-title', 'App\Http\Controllers\SelectTitleController@index')->name('select-title');
    Route::post('select-title', 'App\Http\Controllers\SelectTitleController@submitSelect')->name('select-title');

    Route::get('input-info', 'App\Http\Controllers\InputInfoController@index')->name('input-info');
    Route::get('get-district', 'App\Http\Controllers\InputInfoController@getDistrictByIdProvince')->name('get-district');
    Route::get('get-ward', 'App\Http\Controllers\InputInfoController@getWardByIdDistrict')->name('get-ward');

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit'])->middleware('select.title');
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update'])->middleware('select.title');

    Route::post('upload-image', 'App\Http\Controllers\ProfileController@uploadImage')->name('upload-image');

    Route::get('tieucuan', 'App\Http\Controllers\TieuchuanController@index')->name('tieuchuan')->middleware('select.title');

    Route::get('map', function () {return view('pages.maps');})->name('map');
    Route::get('icons', function () {return view('pages.icons');})->name('icons');
    Route::get('table-list', function () {return view('pages.tables');})->name('table');
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

