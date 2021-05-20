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
      $gameGenreArray = array('');
      // dd($gameGenreArray);
      foreach ($gameGenre as $genre) {
        $temp = $genre->genreId;
        array_push($gameGenreArray, $temp);
      }
      // dd($gameGenreArray);
      // dd($game);
      return view('admingamedetails', ['game' => $game, 'genreList' => $genreList, 'gameGenre' => $gameGenreArray]);
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
      return AdminModel::submitGameChanges($gameId, $namaGame, $platform, $qty, $genre);
      // return redirect()->route('games');
    }

    function pricing(){
      $pricing = AdminModel::getPricing();
      return view('adminpricing', ['pricing' => $pricing]);
    }

    function submitPricingChanges(){
      $response = request()->post();
      $gamePrice = $response['gamePrice'];
      $consolePrice = $response['consolePrice'];
      return AdminModel::submitPricingChanges($gamePrice, $consolePrice);
    }

    function orders(){
      echo "orders";
    }

    function console(){
      $consoles = AdminModel::getConsoles();
      return view('adminconsoles',['consoles'=>$consoles]);
    }

    function consoleDetails($id){
      $console = AdminModel::getConsoleDetails($id);
      return view('adminconsoledetails', ['console' => $console]);
    }

    function submitConsoleChanges(){
      $response = request()->post();
      $idConsole = $response['ConsoleID'];
      $namaConsole = $response['NamaConsole'];
      $qty = $response['qty'];
      $manufacturer = $response['manufacturer'];

      return AdminModel::submitConsoleChanges($idConsole, $namaConsole, $qty, $manufacturer);
    }

    function addnewgame(){
      $genreList = AdminModel::getGenres();
      $platformList = AdminModel::getPlatformList();
      return view('adminaddnewgame', ['genreList' => $genreList, 'platformList' => $platformList]);
    }

    function submitnewgame(){
      $response = request()->post();
      $namaGame = $response['namaGame'];
      $platform = $response['platform'];
      $qty = $response['qty'];
      $genre = array_slice($response, 4);
      // dump($response); dump($genre);
      return AdminModel::submitNewGame($namaGame, $platform, $qty, $genre);
    }

    function addnewconsole(){
      return view('adminaddnewconsole');
    }

    function submitnewconsole(){
      $response = request()->post();
      $namaConsole = $response['NamaConsole'];
      $qty = $response['qty'];
      $manufacturer = $response['manufacturer'];
      return AdminModel::submitNewConsole($namaConsole, $qty, $manufacturer);
    }

    function deletegame($id){
      return AdminModel::deleteGame($id);
    }

    function deleteconsole($id){
      return AdminModel::deleteConsole($id);
    }

}
