<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFetch;
use App\Models\CartModel;
use App\Models\Auth;

class CartController extends Controller
{
    function getcart(){
      if(!Auth::isLoggedIn()) return redirect()->route('login');
      $email = session('email');
      $consoleCart = CartModel::getConsoleCart($email);
      $gameCart = CartModel::getGameCart($email);
      // dd($gameCart);
      return view('cart', ['consoleCart' => $consoleCart, 'gameCart' => $gameCart]);
    }

    function returngame($id){
      if(!Auth::isLoggedIn()) return redirect()->route('login');
      $email = session('email');
      return CartModel::returnGame($email, $id);
    }

    function returnconsole($id){
      if(!Auth::isLoggedIn()) return redirect()->route('login');
      $email = session('email');
      return CartModel::returnConsole($email, $id);
    }

    function tempcart(){
      if(!Auth::isLoggedIn()) return redirect()->route('login');
      $email = session('email');
      $gameCart = CartModel::getGameTemp($email);
      $consoleCart = CartModel::getConsoleTemp($email);
      $gamePrice = 0;
      $consolePrice = 0;
      foreach ($gameCart as $g) {
        $gamePrice += $g->harga;
      }
      foreach ($consoleCart as $c) {
        $consolePrice += $c->harga;
      }
      // dd($consoleCart);
      $finalPrice = $consolePrice + $gamePrice;
      return view('tempcart', [
        'consoleCart' => $consoleCart,
        'gameCart' => $gameCart,
        'price' => $finalPrice
      ]);
    }

    function deletegame($id){
      if(!Auth::isLoggedIn()) return redirect()->route('login');
      $email = session('email');
      return CartModel::deleteGame($email, $id);
    }

    function deleteconsole($id){
      if(!Auth::isLoggedIn()) return redirect()->route('login');
      $email = session('email');
      return CartModel::deleteConsole($email, $id);
    }

    function checkout(Request $request){
      if(!Auth::isLoggedIn()) return redirect()->route('login');
      $request->validate([
        'days' => 'required|numeric|min:0|multiple_of:1'
      ]);
      $email = session('email');
      $days = $request->days;
      return CartModel::checkout($email, $days);
    }

}
