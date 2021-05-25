<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\Auth;
use App\Http\Controllers\URL;
use Session;
use Illuminate\Support\Str;

//I dont want to actually sanitize admin inputs, why bother doing injections in admin page?
//Just wreck the sql already dude

//This whole file is just spaghetti, dont bother reading the code

class AdminModelController extends Controller
{
    function index(){
      if(!Auth::authAdmin()) return redirect()->route('home');
      return view('adminindex');
    }

    function games(){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $games = AdminModel::getGames();
      // dump($games);
      return view('admingames',['games'=>$games]);
    }

    function gameDetails($id){
      if(!Auth::authAdmin()) return redirect()->route('home');
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

    function submitGameChanges(Request $request){
      if(!Auth::authAdmin()) return redirect()->route('home');
      // dd(request()->post());
      $response = request()->post();
      $gameId = $response['IdGame'];
      $namaGame = $response['namaGame'];
      $platform = $response['platform'];
      $qty = $response['qty'];
      $description = $response['description'];
      $harga = $response['harga'];
      $genre = array_slice($response, 7);
      //Gambar thingy
      //Validate image
      $validateImage = $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
      ]);
      //Create image name
      $namaGambar = null;
      if($request->gambar !== null){
      $namaGambar = Str::random(20).'.'.$request->gambar->extension();
      //Move n rename
      $request->gambar->move(public_path('img/game'), $namaGambar);
      }
      // dd($request->gambar);
      return AdminModel::submitGameChanges($gameId, $namaGame, $platform, $qty, $genre, $description, $harga, $namaGambar);
      // return redirect()->route('games');
    }

    function pricing(){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $pricing = AdminModel::getPricing();
      return view('adminpricing', ['pricing' => $pricing]);
    }

    function submitPricingChanges(){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $response = request()->post();
      $gamePrice = $response['gamePrice'];
      $consolePrice = $response['consolePrice'];
      return AdminModel::submitPricingChanges($gamePrice, $consolePrice);
    }
    //TODO :: Orders
    function gameship(){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $ships = AdminModel::getGameShipping();
      return view('admingameshiporders', ['ships' => $ships]);
    }

    function gameshipapprove($id){
      if(!Auth::authAdmin()) return redirect()->route('home');
      return AdminModel::gameShipApprove($id);
    }

    function gamereturn(){
        if(!Auth::authAdmin()) return redirect()->route('home');
        $orders = AdminModel::getGameReturn();
        return view('admingamereturnorders', ['orders' => $orders]);
    }

    function gamereturnapprove($id){
      if(!Auth::authAdmin()) return redirect()->route('home');
      return AdminModel::gameReturnApprove($id);
    }

    function consoleship(){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $ships = AdminModel::getConsoleShipping();
      return view('adminconsoleshiporders', ['ships' => $ships]);
    }

    function consoleshipapprove($id){
      if(!Auth::authAdmin()) return redirect()->route('home');
      return AdminModel::consoleShipApprove($id);
    }

    function consolereturn(){
        if(!Auth::authAdmin()) return redirect()->route('home');
        $orders = AdminModel::getConsoleReturn();
        return view('adminconsolereturnorders', ['orders' => $orders]);
    }

    function getallorders(){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $consoles = AdminModel::getAllConsoleOrders();
      $games = AdminModel::getAllGameOrders();
      return view('adminallorders', ['consoles' => $consoles, 'games' => $games]);
    }

    function console(){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $consoles = AdminModel::getConsoles();
      return view('adminconsoles',['consoles'=>$consoles]);
    }

    function consoleDetails($id){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $console = AdminModel::getConsoleDetails($id);
      return view('adminconsoledetails', ['console' => $console]);
    }

    function submitConsoleChanges(Request $request){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $response = request()->post();
      $idConsole = $response['ConsoleID'];
      $namaConsole = $response['NamaConsole'];
      $qty = $response['qty'];
      $manufacturer = $response['manufacturer'];
      $description = $response['description'];
      $harga = $response['harga'];
      //Validate image
      $validateImage = $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
      ]);
      //Create image name
      $namaGambar = null;
      if($request->gambar !== null){
      $namaGambar = $idConsole.'.'.$request->gambar->extension();
      //Move n rename
      $request->gambar->move(public_path('img/console'), $namaGambar);
      }
      return AdminModel::submitConsoleChanges($idConsole, $namaConsole, $qty, $manufacturer, $description, $harga, $namaGambar);
    }

    function addnewgame(){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $genreList = AdminModel::getGenres();
      $platformList = AdminModel::getPlatformList();
      return view('adminaddnewgame', ['genreList' => $genreList, 'platformList' => $platformList]);
    }

    function submitnewgame(Request $request){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $response = request()->post();
      $namaGame = $response['namaGame'];
      $platform = $response['platform'];
      $qty = $response['qty'];
      $description = $response['description'];
      $harga = $response['harga'];
      //Image processing thing
      $validateImage = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
      ]);
      //Create image name
      $namaGambar = Str::random(20).'.'.$request->gambar->extension();
      //Move n rename
      $request->gambar->move(public_path('img/game'), $namaGambar);

      $genre = array_slice($response, 6);
      // dd($genre);
      return AdminModel::submitNewGame($namaGame, $platform, $qty, $genre, $description, $harga, $namaGambar);
    }

    function addnewconsole(){
      if(!Auth::authAdmin()) return redirect()->route('home');
      return view('adminaddnewconsole');
    }

    function submitnewconsole(Request $request){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $response = request()->post();
      $namaConsole = $response['NamaConsole'];
      $qty = $response['qty'];
      $manufacturer = $response['manufacturer'];
      $description = $response['description'];
      $harga = $response['harga'];
      //Urusin gambar disini :
      //Validate image
      $validateImage = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
      ]);
      //Create image name
      $namaGambar = Str::random(20).'.'.$request->gambar->extension();
      //Move n rename
      $request->gambar->move(public_path('img/console'), $namaGambar);

      return AdminModel::submitNewConsole($namaConsole, $qty, $manufacturer, $description, $harga, $namaGambar);
    }

    function deletegame($id){
      if(!Auth::authAdmin()) return redirect()->route('home');
      return AdminModel::deleteGame($id);
    }

    function deleteconsole($id){
      if(!Auth::authAdmin()) return redirect()->route('home');
      return AdminModel::deleteConsole($id);
    }

    function addnewgenre(){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $genres = AdminModel::getGenres();
      return view('adminaddnewgenre', ['genres' => $genres]);
    }

    function addgenre(){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $genreName = request()->genre;
      return AdminModel::addGenre($genreName);
    }

    function deletegenre(){
      if(!Auth::authAdmin()) return redirect()->route('home');
      $genreId = request()->genre;
      return AdminModel::deleteGenre($genreId);
    }

}
