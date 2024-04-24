<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChancesController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/Elenco', [ChancesController::class, 'showTable2']);

Route::get('/', [ChancesController::class, 'welcome']);

Route::get('/QuemSomos', [ChancesController::class, 'quemsomos']);

Route::get('/Chances', [ChancesController::class, 'chances']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
