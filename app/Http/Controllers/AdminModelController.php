<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Http\Controllers\URL;

//I dont want to actually sanitize admin inputs, why bother doing injections in admin page?
//Just wreck the sql already dude

class AdminModelController extends Controller
{
    function index(){
      return view('adminindex');
    }

    function games(){
      $games = AdminModel::getGames();
      // dump($games);
      return view('admingames',['games'=>$games]);
    }

    function gameDetails($id){
      $game = AdminModel::getGameDetails($id);
      $genreList = AdminModel::getGenres();
      // $genreListArray = array('');
      // foreach ($genreList as $genre) {
      //   $temp = $genre->genreName;
      //   array_push($genreListArray, $temp);
      // }
      // if(in_array('Fighting', $genreListArray)) dd($genreList);
      $gameGenre = AdminModel::getGameGenres($id);
      // $gameGenreArray = array('');
      // // dd($gameGenreArray);
      // foreach ($gameGenre as $genre) {
      //   $temp = $genre;
      //   array_push($gameGenreArray, $temp);
      // }
      // dd($gameGenreArray);
      // dd($game);
      return view('admingamedetails', ['game' => $game, 'genreList' => $genreList, 'gameGenre' => $gameGenre]);
    }

    function submitGameChanges(){
      // dd(request()->post());
      $response = request()->post();
      $gameId = $response['IdGame'];
      $namaGame = $response['namaGame'];
      $platform = $response['platform'];
      $qty = $response['qty'];
      $genre = array_slice($response, 5);
      // dd($genre);
      AdminModel::submitGameChanges($gameId, $namaGame, $platform, $qty, $genre);
      return redirect()->route('games');
    }

    function configs(){

    }

    function orders(){
      echo "orders";
    }

    function console(){
      $consoles = AdminModel::getConsoles();
      return view('adminconsoles',['consoles'=>$consoles]);
    }
}
