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
Route::post('/register', 'UserRegisterController@register');
Route::post('/login', 'AuthController@signIn')->name('login');

Route::middleware(['auth:sanctum'])->group(
    function () {
        Route::post('/logout', 'AuthController@signOut');
        Route::prefix('/news')->group(
            function () {
                Route::get('', 'NewsController@getLastTenNews');
                Route::post('', 'NewsController@storeUserNews');
                Route::delete('', 'NewsController@deleteUserNews');
                Route::get('/user', 'NewsController@getUserNews');
            }
        );
    }
);
