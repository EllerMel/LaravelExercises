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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clock', function() {
    return view('clock');
});

Route::get('/countdown', function() {
    return view('countdown');
});

Route::get('/TicTacToe', function() {
    return view('TicTacToe');
});

Route::get('/calculator', function() {
    return view('calculator');
});

Route::get('/mindreader', function() {
    return view('mindreader');
});

Route::get('/weather', function() {
    return view('weather');
});

Route::resource('weather-app', 'WeatherController');

Route::get('/todoList', function() {
    return view('todoList');
});

Route::get('/restaurant', function () {
    return view('restaurant');
});

Route::get('all', 'todoController@index');
Route::get('completed', 'todoController@completed');
Route::get('remaining', 'todoController@remaining');
Route::post('new', 'todoController@store');
Route::post('update', 'todoController@update');
Route::post('clear', 'todoController@clear');

Route::resource('todoList/todos', 'todoController');

Route::resource('tasks', 'taskController');