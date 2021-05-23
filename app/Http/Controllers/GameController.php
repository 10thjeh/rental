<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFetch;
use App\Models\CartModel;
use App\Models\Auth;


class GameController extends Controller
{
    public function index(){
        $games = DataFetch::getGames();
        $genres = DataFetch::getGenres();
        return view('game',['games' => $games, 'genres' => $genres]);
    }

    function genre($gameid){
        $games = DataFetch::getGamesByGenre($gameid);
        $genres = DataFetch::getGenres();
        return view('game',['games' => $games, 'genres' => $genres]);
    }

    function addtocart(){
      if(!Auth::isLoggedIn()) return redirect()->route('login');
      $response = request()->post();
      $gameId = $response['gameId'];
      $hari = $response['hari'];
      $userEmail = session('email');
      return CartModel::addGameToCart($gameId, $userEmail, $hari);
    }
}
