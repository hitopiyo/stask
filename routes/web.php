<?php
use App\Http\Controllers\StudentController;
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
Route::get('/', function(){
    return view(('welcome'));
});

Route::get('/logins', function(){
    return view(('logins'));
});
Route::get('/registers', function(){
    return view(('registers'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/menu', 'StudentController@index')->name('menu');
Route::get('/addstudent', 'StudentController@create')->name('create');

Route::post('/store', 'StudentController@store')->name('store');
