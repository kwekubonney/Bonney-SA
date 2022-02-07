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
Route::get('/', 'HomeController@homePage'); 
Route::get('/mainAdmin', function () {
    return view('admin.index');
});

Route::get('/team', 'teamController@index');
Route::post('/team/store', 'teamController@store');
Route::get('/teamRep/{id}', 'teamController@teamRep');
Route::post('/teamRep/create', 'teamController@createTeamrep');
Route::get('/team/edit/{id}', 'teamController@edit');
Route::post('/team/edit/{id}', 'teamController@update');
Route::post('/changeLogo/{id}', 'teamController@changeLogo');
Route::get('/teamdetail/{id}', 'teamController@teamDetail');
Route::get('/squart/{id}', 'teamController@squartCreate');
Route::post('/squart/create', 'teamController@squartStore');

Route::get('/role_permission', 'settingController@index');
Route::post('/role/create', 'settingController@rolecreate');
Route::post('/permission/create', 'settingController@permissioncreate');
Route::post('/agent/create', 'settingController@createAgent');
Route::post('/staff/create', 'settingController@createStaff');
Route::post('/press/create', 'settingController@createPress');
Route::get('/team/create', 'settingController@createTeam');
Route::post('/assign', 'settingController@assign');
Route::post('/assignPermission', 'settingController@assignPermission');

Route::get('/configuration', 'AdminController@user');
Route::get('/appuser', 'AdminController@appuser');
Route::get('/player/create', 'AdminController@players');
Route::post('/player/create', 'AdminController@storePlayer');
Route::post('/venue/create', 'AdminController@venue');
Route::post('/fixture/create', 'AdminController@fixture');
Route::get('/fixture/edit/{id}', 'AdminController@fixtureEdit');
Route::post('/newsType', 'AdminController@newsType');
Route::get('/fixtureDetail/{id}', 'AdminController@fixtureDetail');

Route::get('/game', 'gameController@index');
Route::get('/result/{id}', 'gameController@result');
Route::get('/gameCover/{id}', 'gameController@gamecover');
Route::post('/result/store', 'gameController@resultCreate');
Route::post('/statistics/store', 'gameController@gameStatistic');
Route::post('/result/update', 'gameController@resultUpdate');
Route::get('/game/detail/{id}', 'gameController@gameDetail');
Route::post('/halftime', 'gameController@halfTime');
Route::post('/matchend/{id}', 'gameController@matchend');
Route::get('/resultDetail/{id}','gameController@resultDetail');

Route::get('/role','HomeController@role');
Route::get('/admin','HomeController@admin');
Route::get('/news', 'HomeController@news');
Route::get('/news/edit/{id}', 'HomeController@newsEdit');
Route::post('/news/edit/{id}', 'HomeController@newsUpdate');
Route::post('/news/create', 'HomeController@newsStore');

Auth::routes();

Route::get('/dashboard', 'HomeController@index'); //->name('home');

Route::get('/fixture', 'PagesControler@fixture');
Route::get('/result', 'PagesControler@result');
Route::get('/leagueTeam', 'PagesControler@team');
Route::get('/table', 'PagesControler@table');
Route::get('/news/show/{id}', 'PagesControler@newsShow');

Route::get('/team/page', 'teamController@social');

