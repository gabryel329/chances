<?php

use Illuminate\Support\Facades\Route;

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
