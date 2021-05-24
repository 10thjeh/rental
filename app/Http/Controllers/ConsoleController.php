<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFetch;
use App\Models\CartModel;
use App\Models\Auth;


class ConsoleController extends Controller
{
    public function index(){
        DataFetch::getConsoles();
        $consoles = DataFetch::getConsoles();
        return view('console',['consoles' => $consoles]);
    }

    function category($manufacturer){
        $consoles = DataFetch::getConsoleByManufacturer($manufacturer);
        return view('console',['consoles' => $consoles]);
    }

    function addtocart(){
      if(!Auth::isLoggedIn()) return redirect()->route('login');
      $response = request()->post();
      $consoleId = $response['consoleId'];
      $hari = $response['hari'];
      $userEmail = session('email');
      return CartModel::addConsoleToCart($consoleId, $userEmail, $hari);
    }
}
