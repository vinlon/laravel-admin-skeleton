<?php

use Illuminate\Support\Facades\Route;
use Vinlon\Laravel\LayAdmin\AdminResponse;

Route::middleware(['auth:lay-admin', AdminResponse::class])->group(function () {
    # 资源管理
    Route::get('image_resources', 'ResourceController@listImageResources');
    Route::post('image_resources', 'ResourceController@saveImageResource');
    Route::post('image_resources/upload', 'ResourceController@uploadImage');
    Route::get('text_resources', 'ResourceController@listTextResources');
    Route::post('text_resources', 'ResourceController@saveTextResource');
});
