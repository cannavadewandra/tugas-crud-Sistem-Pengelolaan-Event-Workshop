<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tiket.index');
});


use App\Http\Controllers\TiketController;

Route::resource('tiket', TiketController::class);