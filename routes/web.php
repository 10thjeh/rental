<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminModelController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CartController;

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
/*==============
Admin Route
================*/
Route::get('/admin', [AdminModelController::class,'index'])->name('admin');

Route::get('/admin/games', [AdminModelController::class,'games'])->name('games');
Route::get('/admin/gamedetails/{id}', [AdminModelController::class,'gameDetails'])->name('gameDetails');

Route::post('/admin/submitgamechanges', [AdminModelController::class, 'submitGameChanges']);
Route::post('/admin/submitconsolechanges', [AdminModelController::class, 'submitConsoleChanges']);
Route::post('/admin/submitpricingchanges', [AdminModelController::class, 'submitPricingChanges']);
Route::post('/admin/submitnewgame', [AdminModelController::class, 'submitnewgame']);
Route::post('/admin/submitnewconsole', [AdminModelController::class, 'submitnewconsole']);

Route::get('/admin/consoles', [AdminModelController::class,'console'])->name('consoles');
/*==========
Admin order routing
===========*/
Route::get('/admin/orders/game/ship', [AdminModelController::class,'gameship']);
Route::get('/admin/orders/game/return', [AdminModelController::class, 'gamereturn']);
Route::get('/admin/orders/game/ship/approve/{id}', [AdminModelController::class, 'gameshipapprove']);
Route::get('/admin/orders/console/ship/approve/{id}', [AdminModelController::class, 'consoleshipapprove']);
Route::get('/admin/orders/game/return/approve/{id}', [AdminModelController::class, 'gamereturnapprove']);
Route::get('/admin/orders/console/return/approve/{id}', [AdminModelController::class, 'consolereturnapprove']);
Route::get('/admin/orders/console/ship', [AdminModelController::class,'consoleship']);
Route::get('/admin/orders/console/return', [AdminModelController::class, 'consolereturn']);
Route::get('/admin/orders/all', [AdminModelController::class, 'getallorders']);

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
Route::get('/login',[LoginController::Class,'loginview'])->name('login');
Route::post('/register/auth', [LoginController::class, 'register']);
Route::post('/login/auth', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('console/{manufacturer}', [ConsoleController::class, 'category']);
Route::get('/game', [GameController::class, 'index']);
Route::get('/game/{gameid}', [GameController::class, 'genre']);
Route::post('/game/addtocart', [GameController::class, 'addtocart']);
Route::post('/console/addtocart', [ConsoleController::class, 'addtocart']);
Route::get('/orderlist', [CartController::class, 'getcart']);
Route::get('/cart/return/game/{id}', [CartController::class, 'returngame']);
Route::get('/cart/return/console/{id}', [CartController::class, 'returnconsole']);
Route::get('/cart',                     [CartController::class, 'tempcart']);
Route::get('/cart/deleteconsole/{id}', [CartController::class, 'deleteconsole']);
Route::get('/cart/deletegame/{id}',   [CartController::class, 'deletegame']);
Route::post('/cart', [CartController::class, 'checkout']);
