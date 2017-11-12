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

use Illuminate\Support\Facades\Route;

Route::get('/', "homeController@home");
Route::post('/allTasks', 'taskController@all');
Route::post('/makeTask', 'taskController@make');
Route::post('/updateTask', 'taskController@update');
Route::post('/deleteTask', 'taskController@delete');
Route::post('/test', 'taskController@sendMessage');

