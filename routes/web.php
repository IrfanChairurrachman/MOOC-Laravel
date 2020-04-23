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


Route::get('/', function () {
    return view('index');
});
*/
Route::get('/', 'CoursesController@index');
Route::get('/admin', 'CoursesController@adminindex');
//bikin controller untuk create
Route::get('/admin/create', 'CoursesController@create');
Route::post('/admin', 'CoursesController@store');
Route::get('/admin/{course}', 'CoursesController@adminshow');
Route::delete('/admin/{course}', 'CoursesController@destroy');
Route::get('/admin/{course}/edit', 'CoursesController@edit');
Route::get('/admin/{course}/create', 'CoursesController@createlesson');
Route::post('/admin/{course}', 'CoursesController@storelesson');
Route::patch('/admin/{course}', 'CoursesController@update');
Route::get('/admin/{course}/{lesson}', 'CoursesController@showadminlesson');
Route::delete('/admin/{course}/{lesson}', 'CoursesController@destroylesson');
Route::get('/admin/{course}/{lesson}/edit', 'CoursesController@editlesson');
Route::patch('/admin/{course}/{lesson}', 'CoursesController@updatelesson');

Route::get('/{course}', 'CoursesController@show');
Route::get('/{course}/{lesson}', 'CoursesController@showlesson');
//bikin
