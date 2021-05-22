<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminModelController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignInController;

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
//Admin route
Route::get('/admin', [AdminModelController::class,'index'])->name('admin');
Route::get('/admin/games', [AdminModelController::class,'games'])->name('games');
Route::get('/admin/gamedetails/{id}', [AdminModelController::class,'gameDetails'])->name('gameDetails');
Route::post('/admin/submitgamechanges', [AdminModelController::class, 'submitGameChanges']);
Route::post('/admin/submitconsolechanges', [AdminModelController::class, 'submitConsoleChanges']);
Route::post('/admin/submitpricingchanges', [AdminModelController::class, 'submitPricingChanges']);
Route::post('/admin/submitnewgame', [AdminModelController::class, 'submitnewgame']);
Route::post('/admin/submitnewconsole', [AdminModelController::class, 'submitnewconsole']);
Route::get('/admin/consoles', [AdminModelController::class,'console'])->name('consoles');
Route::get('/admin/orders', [AdminModelController::class,'orders'])->name('orders');
Route::get('/admin/pricing', [AdminModelController::class,'pricing'])->name('pricing');
Route::get('/admin/consoledetails/{id}', [AdminModelController::class, 'consoleDetails']);
Route::get('/admin/configs', [AdminModelController::class,'configs'])->name('configs');
Route::get('/admin/addnewgame', [AdminModelController::class, 'addnewgame'])->name('newgame');
Route::get('/admin/addnewconsole', [AdminModelController::class, 'addnewconsole'])->name('newconsole');
Route::get('/admin/addnewgenre', [AdminModelController::class, 'addnewgenre'])->name('newgenre');
Route::post('/admin/submitnewgenre', [AdminModelController::class, 'addgenre']);
Route::post('/admin/deletegenre', [AdminModelController::class, 'deletegenre']);
Route::get('/admin/deletegame/{id}', [AdminModelController::class, 'deletegame']);
Route::get('/admin/deleteconsole/{id}', [AdminModelController::class, 'deleteconsole']);

Route::get('/',[HomeController::Class,'index'])->name('home');
Route::get('/home',[HomeController::Class,'index']);
Route::get('/console',[ConsoleController::Class,'index']);
Route::get('/register',[LoginController::Class,'registerview']);
Route::get('/login',[LoginController::Class,'loginview']);
Route::post('/register/auth', [LoginController::class, 'register']);
Route::post('/login/auth', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('console/{manufacturer}', [ConsoleController::class, 'category']);
