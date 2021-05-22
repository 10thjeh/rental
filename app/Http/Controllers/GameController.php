<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFetch;


class GameController extends Controller
{
    public function index(){
        $games = DataFetch::getGames();
        return view('game',['games' => $games]);
    }
}
