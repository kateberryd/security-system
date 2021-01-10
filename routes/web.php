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

Route::get('/', 'AuthenticationController@index')->name('login.get');
Route::post('/', 'AuthenticationController@loginPost')->name('login.post');
Route::post('/logout', 'AuthenticationController@logout')->name('logout');



Route::get('/dashboard', 'PagesController@index')->name('dashboard.index');


Route::get('/users', 'UsersController@index');
Route::get('/add-user', 'UsersController@create');
Route::post('/add-user', 'UsersController@store')->name('store.user');
Route::get('/update-user/{id}', 'UsersController@edit')->name('edit.user');
Route::post('/update-user/{id}', 'UsersController@update')->name('update.user');
Route::get('/user/{id}', 'UsersController@delete')->name('delete.user');



Route::get('/leave-requests', 'LeaveRequestController@index');
Route::get('/request-actions/{id}', 'LeaveRequestController@requestActions');


Route::get('/duty-posts', 'DutyPostController@index');
Route::get('/create-duty-post', 'DutyPostController@create');
Route::post('/create-duty-post', 'DutyPostController@store')->name('store.post');
Route::get('/update-duty-post/{id}', 'DutyPostController@edit')->name('edit.post');
Route::post('/update-duty-post/{id}', 'DutyPostController@update')->name('update.post');
Route::get('/duty-post/{id}', 'DutyPostController@delete')->name('delete.post');

Route::get('/assign-duty-post', 'AssignDutyController@create')->name('get.assign-duty');
Route::post('/assign-duty-post', 'AssignDutyController@store')->name('store.assign-duty');
Route::get('/assigned-duties', 'AssignDutyController@index')->name('index.assign-duty');



// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');
