<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChancesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Elenco', function () {
    return view('elenco');
});

Route::get('/Chances', function () {
    return view('chances');
});

Route::get('/QuemSomos', function () {
    return view('quemsomos');
});

Route::get('/read-excel', [ChancesController::class, 'readExcel']);
Route::get('/show-table', [ChancesController::class, 'showTable']);