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
Route::get('/stamp', [AtteController::class, 'stamp'])->middleware(['auth', 'verified']);

Route::post('/date', [AtteController::class, 'date'])->middleware(['auth', 'verified']);
Route::post('/stamp', [AtteController::class, 'stamp'])->middleware(['auth', 'verified']);

Route::post('/work_start', [AtteController::class, 'workStart']);
Route::post('/work_end', [AtteController::class, 'workEnd']);

Route::post('/break_start', [AtteController::class, 'breakStart']);
Route::post('/break_end', [AtteController::class, 'breakEnd']);

Route::post('/sub_date', [AtteController::class, 'subDate'])->middleware(['auth', 'verified']);
Route::post('/add_date', [AtteController::class, 'addDate'])->middleware(['auth', 'verified']);
//Route::post('/stamp', [AtteController::class, 'stamp']);

//Route::post('/register', [AtteController::class, 'date']);
