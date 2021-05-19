<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminModelController;

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

Route::get('/admin', [AdminModelController::class,'index'])->name('admin');
Route::get('/admin/games', [AdminModelController::class,'games'])->name('games');
Route::get('/admin/gamedetails/{id}', [AdminModelController::class,'gameDetails']);
Route::get('/admin/consoles', [AdminModelController::class,'console'])->name('consoles');
Route::get('/admin/orders', [AdminModelController::class,'orders'])->name('orders');