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

Route::get('/income', 'IncomeController@index');
Route::get('/addincome','IncomeController@add');
Route::post('/addincome','IncomeController@store');
Route::get('/delete/{$id}','IncomeController@destroy');
Route::get('/income/delete/{id}', 'IncomeController@delete')->name('income.delete');

Route::get('/income/edit/{id}', 'IncomeController@edit')->name('income.edit');
Route::post('/income/update/{id}','IncomeController@update')->name('income.update');

Route::resource('/outcome','OutcomeController');
Route::get('/outcome/delete/{id}', 'OutcomeController@destroy')->name('outcome.delete');


Route::get('/save','SaveController@index')->name('save.index');
Route::get('/save/create','SaveController@create')->name('save.create');
Route::post('/save','SaveController@store')->name('save.save');
Route::get('/save/{id}/edit','SaveController@edit')->name('save.edit');
Route::post('/save/{id}','SaveController@update')->name('save.update');
Route::get('/save/delete/{id}','SaveController@destroy')->name('save.delete');



Route::get('/report', function () {
    return view('report.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
