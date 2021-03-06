<?php

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

Route::middleware([\App\Http\Middleware\ApiResponse::class])->group(function () {
    # 资源管理
    Route::get('resource/images', 'ResourceController@getImages');
    Route::get('resource/texts', 'ResourceController@getTexts');
});
