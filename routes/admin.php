<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:lay-admin', \App\Http\Middleware\AdminResponse::class])->group(function () {
});
