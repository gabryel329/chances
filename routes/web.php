<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChancesController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/Elenco', [ChancesController::class, 'showTable2']);

Route::get('/', [ChancesController::class, 'readExcel']);

Route::get('/QuemSomos', [ChancesController::class, 'readExcel2']);

Route::get('/Chances', [ChancesController::class, 'showTable']);