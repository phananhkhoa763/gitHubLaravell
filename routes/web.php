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


use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('dashboard', 'HomeController@index')->name('dashboard');
Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get(
            'button',
            function () {
                return view('admin.button');
            }
        )->name('button');
        Route::get(
            'notifications',
            function () {
                return view('admin.notifications');
            }
        )->name('notifications');
        Route::get(
            'badges',
            function () {
                return view('admin.badges');
            }
        )->name('badges');
        Route::get(
            'tabs',
            function () {
                return view('admin.tabs');
            }
        )->name('tabs');
        Route::get(
            'socialButton',
            function () {
                return view('admin.socialButton');
            }
        )->name('socialButton');
        Route::get(
            'cards',
            function () {
                return view('admin.cards');
            }
        )->name('cards');
        Route::get(
            'alerts',
            function () {
                return view('admin.alerts');
            }
        )->name('alerts');
        Route::get(
            'bars',
            function () {
                return view('admin.bars');
            }
        )->name('bars');
        Route::get(
            'modals',
            function () {
                return view('admin.modals');
            }
        )->name('modals');
        Route::get(
            'switches',
            function () {
                return view('admin.switches');
            }
        )->name('switches');
        Route::get(
            'grids',
            function () {
                return view('admin.grids');
            }
        )->name('grids');
        Route::get(
            'typography',
            function () {
                return view('admin.typography');
            }
        )->name('typography');
        Route::get(
            'datatables',
            function () {
                return view('admin.datatables');
            }
        )->name('datatables');
        Route::get(
            'basictables',
            function () {
                return view('admin.basictables');
            }
        )->name('basictables');
        Route::get(
            'basicforms',
            function () {
                return view('admin.basicform');
            }
        )->name('basicform');
        Route::get(
            'advancedforms',
            function () {
                return view('admin.advancedform');
            }
        )->name('advancedform');
        Route::get(
            'fontAwesome',
            function () {
                return view('admin.fontawesome');
            }
        )->name('fontAwesome');
        Route::get(
            'themefy',
            function () {
                return view('admin.themify');
            }
        )->name('themefy');
        Route::get(
            'Widgets',
            function () {
                return view('admin.widgets');
            }
        )->name('Widgets');
        Route::get(
            'Chartjs',
            function () {
                return view('admin.chartjs');
            }
        )->name('Chartjs');
        Route::get(
            'FloatChart',
            function () {
                return view('admin.floatchart');
            }
        )->name('floatChart');
        Route::get(
            'peitychart',
            function () {
                return view('admin.peitychart');
            }
        )->name('peitychart');
        Route::get(
            'gmap',
            function () {
                return view('admin.gmap');
            }
        )->name('gmap');
        Route::get(
            'vectormap',
            function () {
                return view('admin.vectormap');
            }
        )->name('vectormap');
        Route::group(['prefix' => 'user'], function () {
            Route::get('index', 'QuanTriHeThong\QuanLyNguoiDung\UserController@index')->name('user.index');
            Route::get('destroy/{id}', 'QuanTriHeThong\QuanLyNguoiDung\UserController@destroy')->name('user.destroy');
            Route::get('edit/{id}', 'QuanTriHeThong\QuanLyNguoiDung\UserController@edit')->name('user.edit');
            Route::post('update/{id}', 'QuanTriHeThong\QuanLyNguoiDung\UserController@update')->name('user.update');
            Route::get('create', 'QuanTriHeThong\QuanLyNguoiDung\UserController@create')->name('user.create');
        });
        Route::group(['prefix' => 'nhom'], function () {
            Route::get('index', 'QuanTriHeThong\QuanLyNhom\NhomController@index')->name('nhom.index');
            Route::get('edit/{id}', 'QuanTriHeThong\QuanLyNhom\NhomController@edit')->name('nhom.edit');
            Route::post('update/{id}', 'QuanTriHeThong\QuanLyNhom\NhomController@update')->name('nhom.update');
            Route::get('create/{id}', 'QuanTriHeThong\QuanLyNhom\NhomController@create')->name('nhom.create');
            Route::post('store/{id}', 'QuanTriHeThong\QuanLyNhom\NhomController@store')->name('nhom.store');
            Route::get('destroy/{id}', 'QuanTriHeThong\QuanLyNhom\NhomController@destroy')->name('nhom.destroy');
        });
    }

);
