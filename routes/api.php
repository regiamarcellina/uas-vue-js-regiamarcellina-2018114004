<?php

use App\Http\Controllers\Api\ProfilsController;
use App\Http\Controllers\Api\KontaksController;
use App\Http\Controllers\Api\PengalamansController;
use App\Http\Controllers\Api\HistorysController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/', [HomeController::class, 'index']);
Route::resources([
    'profils' => ProfilsController::class,
    'kontaks' => KontaksController::class,
    'pengalamans' => PengalamansController::class,
    'historys' => HistorysController::class,
    ]); 