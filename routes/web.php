<?php

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
Route::get('/info', function () {
    return phpinfo();
});

Auth::routes();
//Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('object/get_by_title', 'App\Http\Controllers\SelectTitleController@get_by_title')->name('user.object.get_by_title');
    Route::get('select-title', 'App\Http\Controllers\SelectTitleController@index')->name('select-title');
    Route::post('select-title', 'App\Http\Controllers\SelectTitleController@submitSelect')->name('select-title');

    Route::group(['middleware' => 'select.title'], function () {
        Route::get('input-info', 'App\Http\Controllers\InputInfoController@index')->name('input-info');
        Route::get('get-district', 'App\Http\Controllers\InputInfoController@getDistrictByIdProvince')->name('get-district');
        Route::get('get-ward', 'App\Http\Controllers\InputInfoController@getWardByIdDistrict')->name('get-ward');
        Route::post('fill-info', 'App\Http\Controllers\InputInfoController@submitInfo')->name('fill-info');

        Route::group(['middleware' => 'fill.info'], function () {
            Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
            Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
            Route::resource('user', 'App\Http\Controllers\ManagerUserController', ['except' => ['show']]);

            Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
            Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);

            Route::post('upload-image', 'App\Http\Controllers\ProfileController@uploadImage')->name('upload-image');

            Route::get('tieucuan', 'App\Http\Controllers\TieuchuanController@index')->name('tieuchuan');
            Route::post('file-upload', 'App\Http\Controllers\UploadFilesController@store')->name('file-upload');
            Route::post('file-delete', 'App\Http\Controllers\UploadFilesController@drop')->name('file-delete');
            Route::post('submit-reply', 'App\Http\Controllers\TieuchuanController@submitReply')->name('submit-reply');

            Route::get('print-info', 'App\Http\Controllers\PrintInfoController@index')->name('print-info');

            // For khoa managerment
            Route::get('tong-hop-don-vi', 'App\Http\Controllers\ManagerController@getListUserByTitle')->name('tong-hop-don-vi');

            Route::group(['middleware' => 'danhhieu.doituong'], function() {
                Route::get('duyet', 'App\Http\Controllers\ManagerController@getUser')->name('duyet');
                Route::post('acceptDeCu', 'App\Http\Controllers\ManagerController@acceptDeCu')->name('acceptDeCu');
            });
            Route::post('send-comment', 'App\Http\Controllers\ManagerController@submitComment')->name('send-comment');

            Route::group(['middleware' => 'admin'], function() {
                Route::get('quan-ly-danh-hieu', 'App\Http\Controllers\ManagerTitlesController@Title')->name('quan-ly-danh-hieu');
                Route::get('lay-danh-hieu', 'App\Http\Controllers\ManagerTitlesController@getTitle')->name('lay-danh-hieu');
                Route::get('xem-danh-hieu', 'App\Http\Controllers\ManagerTitlesController@viewTitle')->name('xem-danh-hieu');
                Route::post('sua-danh-hieu', 'App\Http\Controllers\ManagerTitlesController@editTitle')->name('sua-danh-hieu');
                Route::post('xoa-danh-hieu', 'App\Http\Controllers\ManagerTitlesController@deleteTitle')->name('xoa-danh-hieu');
                Route::get('form-them-danh-hieu', 'App\Http\Controllers\ManagerTitlesController@viewAddTitle')->name('form-them-danh-hieu');

                Route::get('quan-ly-doi-tuong')->name('quan-ly-doi-tuong');
            });




//            Route::get('map', function () {
//                return view('pages.maps');
//            })->name('map');
//            Route::get('icons', function () {
//                return view('pages.icons');
//            })->name('icons');
//            Route::get('table-list', function () {
//                return view('pages.tables');
//            })->name('table');
            Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
        });
    });
});

