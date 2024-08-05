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


Route::get('/logins', function(){
    return view(('logins'));
});
Route::get('/registers', function(){
    return view(('registers'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'StudentController@index')->name('index');
Route::get('/menu', 'StudentController@index')->name('menu');
Route::get('/addstudent', 'StudentController@create')->name('create');
Route::post('/store', 'StudentController@store')->name('store');
Route::get('/show/{id}', 'StudentController@show')->name('show');
Route::get('/edit/{id}', 'StudentController@edit')->name('edit');
Route::post('/update/{id}', 'StudentController@update')->name('update');
Route::get('/graderegister/{id}', 'StudentController@creategrade')->name('creategrade');
Route::post('/addgrade/{id}', 'StudentController@addgrade')->name('addgrade');
Route::get('/gradeedit/{iid}', 'StudentController@gradeedit')->name('gradeedit');
Route::post('/updategrade/{id}', 'StudentController@updategrade')->name('updategrade');
Route::post('/delete/{id}', 'StudentController@delete')->name('delete');