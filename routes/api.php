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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('task', 'TaskController');
Route::resource('task-member', 'TaskMemberController')->except([
    'index'
]);
Route::resource('sub-task', 'SubTaskController')->except([
    'index'
]);

Route::get('/sub-task-get/{id}', 'SubTaskController@index');
Route::get('/task-member-get/{id}', 'TaskMemberController@index');
Route::get('/user-search/{name}', 'UserSearchController@index');