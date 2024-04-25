<?php

use App\Http\Controllers\ChancesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [ChancesController::class, 'welcome']);

Route::get('/QuemSomos', [ChancesController::class, 'quemsomos']);

Route::get('/Chances', [ChancesController::class, 'chances']);