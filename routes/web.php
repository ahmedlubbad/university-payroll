<?php

use App\Http\Controllers\FullTimeEmployeeController;
use App\Http\Controllers\PartTimeEmployeeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('full', FullTimeEmployeeController::class)->middleware('auth');
Route::resource('part', PartTimeEmployeeController::class)->middleware('auth');
Route::post('full/attend/{id}', [FullTimeEmployeeController::class, 'attend'])->name('full.attend');
Route::post('full/transfer/{id}', [FullTimeEmployeeController::class, 'transfer'])->name('full.transfer');
Route::post('part/attend/{id}', [PartTimeEmployeeController::class, 'attend'])->name('part.attend');
Route::post('part/transfer/{id}', [PartTimeEmployeeController::class, 'transfer'])->name('part.transfer');

