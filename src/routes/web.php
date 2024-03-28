<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AtteController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/login', [AtteController::class, 'login']);

Route::get('/date', [AtteController::class, 'date'])->middleware(['auth', 'verified']);
Route::get('/stamp', [AtteController::class, 'stamp']);

//Route::post('/register', [AtteController::class, 'date']);
