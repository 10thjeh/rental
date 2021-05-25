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

}
