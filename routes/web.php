<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::post('/guest-access', [LandingController::class, 'guestAccess'])->name('guest.access');
