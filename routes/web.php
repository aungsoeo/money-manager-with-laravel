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

// Route::get('/income', 'IncomeController@index');
//
// Route::get('/outcome', function () {
//     return view('app.outcome');
//
// });Route::get('/save', function () {
//     return view('app.save');
//
// });Route::get('/total', function () {
//     return view('app.total');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
