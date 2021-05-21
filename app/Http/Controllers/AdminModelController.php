<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\Auth;
use App\Http\Controllers\URL;
use Session;

//I dont want to actually sanitize admin inputs, why bother doing injections in admin page?
//Just wreck the sql already dude

class AdminModelController extends Controller
{
    function index(){
      if(Auth::authAdmin()) return redirect()->route('home');
      return view('adminindex');
    }

    function games(){
      if(Auth::authAdmin()) return redirect()->route('home');
      $games = AdminModel::getGames();
      // dump($games);
      return view('admingames',['games'=>$games]);
    }

    function gameDetails($id){
      if(Auth::authAdmin()) return redirect()->route('home');
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
      if(Auth::authAdmin()) return redirect()->route('home');
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
      if(Auth::authAdmin()) return redirect()->route('home');
      $pricing = AdminModel::getPricing();
      return view('adminpricing', ['pricing' => $pricing]);
    }

    function submitPricingChanges(){
      if(Auth::authAdmin()) return redirect()->route('home');
      $response = request()->post();
      $gamePrice = $response['gamePrice'];
      $consolePrice = $response['consolePrice'];
      return AdminModel::submitPricingChanges($gamePrice, $consolePrice);
    }

    function orders(){
      if(Auth::authAdmin()) return redirect()->route('home');
      echo "orders";
    }

    function console(){
      if(Auth::authAdmin()) return redirect()->route('home');
      $consoles = AdminModel::getConsoles();
      return view('adminconsoles',['consoles'=>$consoles]);
    }

    function consoleDetails($id){
      if(Auth::authAdmin()) return redirect()->route('home');
      $console = AdminModel::getConsoleDetails($id);
      return view('adminconsoledetails', ['console' => $console]);
    }

    function submitConsoleChanges(){
      if(Auth::authAdmin()) return redirect()->route('home');
      $response = request()->post();
      $idConsole = $response['ConsoleID'];
      $namaConsole = $response['NamaConsole'];
      $qty = $response['qty'];
      $manufacturer = $response['manufacturer'];
      $description = $response['description'];
      $harga = $response['harga'];
      return AdminModel::submitConsoleChanges($idConsole, $namaConsole, $qty, $manufacturer, $description, $harga);
    }

    function addnewgame(){
      if(Auth::authAdmin()) return redirect()->route('home');
      $genreList = AdminModel::getGenres();
      $platformList = AdminModel::getPlatformList();
      return view('adminaddnewgame', ['genreList' => $genreList, 'platformList' => $platformList]);
    }

    function submitnewgame(){
      if(Auth::authAdmin()) return redirect()->route('home');
      $response = request()->post();
      $namaGame = $response['namaGame'];
      $platform = $response['platform'];
      $qty = $response['qty'];
      $genre = array_slice($response, 4);
      // dump($response); dump($genre);
      return AdminModel::submitNewGame($namaGame, $platform, $qty, $genre);
    }

    function addnewconsole(){
      if(Auth::authAdmin()) return redirect()->route('home');
      return view('adminaddnewconsole');
    }

    function submitnewconsole(){
      if(Auth::authAdmin()) return redirect()->route('home');
      $response = request()->post();
      $namaConsole = $response['NamaConsole'];
      $qty = $response['qty'];
      $manufacturer = $response['manufacturer'];
      $description = $response['description'];
      $harga = $response['harga'];
      return AdminModel::submitNewConsole($namaConsole, $qty, $manufacturer);
    }

    function deletegame($id){
      if(Auth::authAdmin()) return redirect()->route('home');
      return AdminModel::deleteGame($id);
    }

    function deleteconsole($id){
      if(Auth::authAdmin()) return redirect()->route('home');
      return AdminModel::deleteConsole($id);
    }

}
