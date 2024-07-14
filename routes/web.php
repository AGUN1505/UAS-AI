<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuzzyController;

Route::get('/', [FuzzyController::class, 'home'])->name('fuzzy.home');
Route::get('/fuzzy', [FuzzyController::class, 'index'])->name('fuzzy.index');
Route::post('/fuzzy/process', [FuzzyController::class, 'fuzzy'])->name('fuzzy.process');
