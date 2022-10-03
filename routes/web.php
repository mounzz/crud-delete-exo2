<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoituresController;

Route::get('/', [VoituresController::class, 'Voitures'])->name('home');

Route::post('/create', [VoituresController::class, "store"]);

Route::delete('/{id}/delete', [VoituresController::class, 'destroy']);
