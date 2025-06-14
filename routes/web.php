<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SendMessageController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');


// send message
Route::get('/send-message', [SendMessageController::class, 'index'])->name('send-message.index');
