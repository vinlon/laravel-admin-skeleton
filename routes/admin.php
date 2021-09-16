<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:lay-admin', AdminResponse::class])->group(function () {
});
