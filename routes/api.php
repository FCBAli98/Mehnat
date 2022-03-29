<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('menu', 'Api\v1\MenuController@index');
Route::get('pages', 'Api\v1\PageController@show');

Route::get('news', 'Api\v1\NewsController@index')->name('news');
Route::get('newss', 'Api\v1\NewsController@show')->name('news.show');

Route::get('employees', 'Api\v1\EmployeesController@index')->name('employees.index');