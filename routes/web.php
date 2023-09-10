<?php

use App\Http\Controllers\RelationsController;
use App\Http\Controllers\WebController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', [WebController::class, 'test']);

Route::get('one_to_one', [RelationsController::class, 'oneToOne']);
Route::get('one_to_many', [RelationsController::class, 'oneToMany']);
Route::get('many_to_many', [RelationsController::class, 'manyToMany']);
