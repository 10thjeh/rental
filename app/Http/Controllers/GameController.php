<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFetch;


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
}
