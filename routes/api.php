<?php
use App\Http\Controllers\ScreenController;
use Illuminate\Support\Facades\Route;

Route::get('/screens', [ScreenController::class, 'index']);