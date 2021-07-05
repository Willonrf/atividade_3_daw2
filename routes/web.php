<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clubeController;
use App\Http\Controllers\jogadorController;
use App\Http\Controllers\posicaoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route:: resources([
    "clube" => clubeController::class
]);
Route:: resources([
    "jogador" =>jogadorController::class
]);
Route:: resources([
    "posicao" => posicaoController::class
]);
Route::get('/', function () {
    return view('welcome');
});
