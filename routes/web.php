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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/admin', function () {
//    return view('admin');
//});
//Route::post('/login', ['as' => 'postLogin', 'uses'=> 'App\Http\Controllers\LoginController@getLogin']);

//Route::get('/register', function() {
//    $units = DB::table('unit')->select('name', 'id')->get();
////    return view('register', ['units' => $units]);
//    return "Xin chao";
//})->name('register');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
