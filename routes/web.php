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
Auth::routes(['verify' => true]);
Route::get('/dashboard', 'DashboardController@index')->middleware('verified')->name('dashboard');
Route::get('/', function () { return view('welcome');});

Route::resource('authorities', 'AuthoritiesController')->middleware('app.auth');
Route::resource('places', 'PlacesController')->middleware('app.auth');
Route::resource('members', 'MembersController')->middleware('app.auth');
Route::resource('reports', 'ReportsController')->middleware('app.auth');
Route::resource('report_details', 'ReportDetailsController')->middleware('app.auth');
Route::resource('times', 'TimesController')->middleware('app.auth');
Route::resource('users', 'UsersController')->middleware('app.auth');
Route::resource('tags', 'TagsController')->middleware('app.auth');
Route::resource('employment_statuses', 'EmploymentStatusesController')->middleware('app.auth');

Route::get('auth/graph', 'Auth\AuthController@redirectToProvider');
Route::get('auth/graph/callback','Auth\AuthController@handleProviderCallback');
Route::get('logout','Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
