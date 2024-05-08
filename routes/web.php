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

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/menu', function () {
    return view('menu');
});
Route::get('/maindetail', function () {
    return view('maindetail');
});
Route::get('/main', function () {
    return view('main');
});
Route::get('/graderegister', function () {
    return view('graderegister');
});
Route::get('/gradeedit', function () {
    return view('gradeedit');
});
Route::get('/edit', function () {
    return view('edit');
});
Route::get('/addstudent', function () {
    return view('addstudent');
});