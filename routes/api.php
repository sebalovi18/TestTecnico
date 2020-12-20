<?php

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('/login' , 'AuthController@login')->name('login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('/news')->group(function(){
        Route::get('/','NewsController@getLastTenNews');
        Route::get('/userNews','NewsController@getUserNews');
        Route::post('/','NewsController@storeUserNews');
        Route::delete('/','NewsController@deleteUserNews');
    });
});
