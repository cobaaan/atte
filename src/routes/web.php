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

Route::get('/attendance', [AtteController::class, 'date'])->middleware(['auth', 'verified']);
Route::get('/', [AtteController::class, 'stamp'])->middleware(['auth', 'verified']);

Route::post('/attendance', [AtteController::class, 'date'])->middleware(['auth', 'verified']);
Route::post('/', [AtteController::class, 'stamp'])->middleware(['auth', 'verified']);

Route::post('/work_start', [AtteController::class, 'workStart']);
Route::post('/work_end', [AtteController::class, 'workEnd']);

Route::post('/break_start', [AtteController::class, 'breakStart']);
Route::post('/break_end', [AtteController::class, 'breakEnd']);

Route::get('/sub_date', [AtteController::class, 'subDate'])->middleware(['auth', 'verified']);
Route::get('/add_date', [AtteController::class, 'addDate'])->middleware(['auth', 'verified']);

Route::get('/attendance_record', [AtteController::class, 'attendanceRecord'])->middleware(['auth', 'verified']);
Route::get('/user_list', [AtteController::class, 'userList'])->middleware(['auth', 'verified']);
