<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;

class AdminModel extends Model
{
    static function getGames(){
      $games = DB::table('game')->get();
      return $games;
    }

    static function getConsoles(){
      $consoles = DB::table('console')->get();
      return $consoles;
    }

    static function getConsoleDetails($id){
      $consoleDetail = DB::table('console')->where('ConsoleID', $id)->get();
      return $consoleDetail;
    }

    static function submitConsoleChanges($idConsole, $namaConsole, $qty, $manufacturer, $description, $harga, $namaGambar){
      DB::beginTransaction();
      if($namaGambar !== null){
      $query = DB::table('console')
                   ->where('ConsoleID', $idConsole)
                   ->update([
                     'NamaConsole' => $namaConsole,
                     'qty' => $qty,
                     'manufacturer' => $manufacturer,
                     'deskripsi' => $description,
                     'harga' => $harga,
                     'gambar' => $namaGambar
                   ]);
      }
      else{
        $query = DB::table('console')
                     ->where('ConsoleID', $idConsole)
                     ->update([
                       'NamaConsole' => $namaConsole,
                       'qty' => $qty,
                       'manufacturer' => $manufacturer,
                       'deskripsi' => $description,
                       'harga' => $harga
                     ]);
      }
      DB::commit();
      if(!$query){
        DB::rollback();
        return back()->withInput();
      }
      return redirect()->route('consoles');
    }

    static function getGameDetails($id){
      $game = DB::table('game')->where('GameID',$id)->get();
      return $game;
    }

    static function getGameGenres($id){
      $gameGenre = DB::table('genre')->where('idGame', $id)->get();
      return $gameGenre;
    }

    static function getGenres(){
      $genres = DB::table('genredetails')->get();
      return $genres;
    }

    static function submitGameChanges($gameId, $namaGame, $platform, $qty, $genre, $description, $harga, $namaGambar){
      //We need to remove all genre before adding new genre
      DB::table('genre')->where('idGame', $gameId)->delete();
      //then iteratively begin to add to the database
      foreach ($genre as $g) {
      DB::table('genre')->insert(['idGame' => $gameId, 'genreId' => $g]);
      }
      //now the real shit begin
      DB::beginTransaction();
      if($namaGambar !== null){
      $query = DB::table('game')
              ->where('GameID', $gameId)
              ->update([
                'NamaGame' => $namaGame,
                'platform' => $platform,
                'qty' => $qty,
                'deskripsi' => $description,
                'harga' => $harga,
                'gambar' => $namaGambar
              ]);
      }
      else{
        $query = DB::table('game')
                ->where('GameID', $gameId)
                ->update([
                  'NamaGame' => $namaGame,
                  'platform' => $platform,
                  'qty' => $qty,
                  'deskripsi' => $description,
                  'harga' => $harga
                ]);
      }
      DB::commit();
      if(!$query){
        DB::rollback();
        return back()->withInput();
      }

      return redirect()->route('games');
    }

    static function getPricing(){
      $pricing = DB::table('pricing')->get();
      return $pricing;
    }

    static function submitPricingChanges($gamePrice, $consolePrice){
      DB::beginTransaction();
      $query = DB::table('pricing')->update(['gamePrice' => $gamePrice, 'consolePrice' => $consolePrice]);
      DB::commit();
      if(!$query){
        DB::rollback();
        return back()->withInput();
      }

      return redirect()->route('pricing');
    }

    static function getPlatformList(){
      $platformList = DB::table('console')->get();
      return $platformList;
    }

    static function submitNewGame($namaGame, $platform, $qty, $genre, $description, $harga, $namaGambar){
      DB::beginTransaction();
      $queryGame = DB::table('game')
                   ->insert([
                     'GameID' => (int) '',
                     'NamaGame' => $namaGame,
                     'platform' => $platform,
                     'qty' => $qty,
                     'deskripsi' => $description,
                     'harga' => $harga,
                     'gambar' => $namaGambar
                   ]);
      //Get gameId after inserting
      $gameIDquery = DB::table('game')
                    ->where('NamaGame', $namaGame)
                    ->where('platform', $platform)
                    ->select('GameID')
                    ->get();
      foreach ($gameIDquery as $gq) {
        $gameID = $gq->GameID;
      }
      // dd($gameID);
      foreach ($genre as $g) {
        DB::table('genre')->insert(['idGame' => $gameID, 'genreId' => $g]);
      }
      DB::commit();
      if(!$queryGame){
        DB::rollback();
        return back()->withInput();
      }

      return redirect()->route('games');
    }

    static function submitNewConsole($namaConsole, $qty, $manufacturer, $description, $harga, $namaGambar){
      DB::beginTransaction();
      $query = DB::table('console')
                   ->insert([
                     'ConsoleID' => (int) '',
                     'NamaConsole' => $namaConsole,
                     'qty' => $qty,
                     'qtyReady' => $qty,
                     'manufacturer' => $manufacturer,
                     'deskripsi' => $description,
                     'harga' => $harga,
                     'gambar' => $namaGambar
                   ]);
      DB::commit();
      if(!$query){
        DB::rollback();
        return back()->withInput();
      }

      return redirect()->route('consoles');
    }

    static function deleteConsole($id){
      DB::beginTransaction();
      $query = DB::table('console')->where('ConsoleID', $id)->delete();
      // dd($query);
      DB::commit();
      if(!$query){
        DB::rollback();
        return back();
      }

      return redirect()->route('consoles');
    }

    static function deleteGame($id){
      DB::beginTransaction();
      $genreQuery = DB::table('genre')->where('idGame', $id)->delete();
      $query = DB::table('game')->where('GameID', $id)->delete();
      DB::commit();
      if(!$query or !$genreQuery){
        DB::rollback();
        return back();
      }

      return redirect()->route('games');
    }

    static function addGenre($genreName){
      DB::beginTransaction();
      $query = DB::table('genredetails')
                   ->insert([
                     'genreId' => (int)'',
                     'genreName' => $genreName
                   ]);
      DB::commit();
      if(!$query){
        DB::rollback();
        return back();
      }
      return redirect()->route('admin');
    }

    static function deleteGenre($genreId){
      DB::beginTransaction();
      //U cant directly delete this because of the foreign key
      //Remove all relation first
      $delQuery = DB::table('genre')
                      ->where(['genreId' => $genreId])
                      ->delete();

      $query = DB::table('genredetails')
                   ->where(['genreId' => $genreId])
                   ->delete();
      DB::commit();
      if(!$query or !$delQuery){
        DB::rollback();
        return redirect()->back()->withErrors(['errors' => 'Failed to perform deletion!']);
      }
      return redirect()->route('admin');
    }

    static function getGameShipping(){
      $query = DB::table('gameorder')
                   ->join('game', 'gameorder.gameId', '=', 'game.GameID')
                   ->select('gameorder.*', 'game.NamaGame')
                   ->where('status', 'Sedang dikirim')
                   ->get();
      return $query;
    }

    static function gameShipApprove($id){
      DB::beginTransaction();
      $query = DB::table('gameorder')
                   ->where('gameOrderId', $id)
                   ->update(['status' => 'Sudah dikirim']);
      DB::commit();
      if(!$query){
        DB::rollback();
        return redirect()->back()->withErrors(['errors' => 'Failed to perform approve!']);
      }

      return redirect()->back();
    }

    static function getConsoleShipping(){
      $query = DB::table('consoleorder')
                   ->join('console', 'consoleorder.consoleId', '=', 'console.ConsoleID')
                   ->select('consoleorder.*', 'console.NamaConsole')
                   ->where('status', 'Sedang dikirim')
                   ->get();
      return $query;
    }

    static function consoleShipApprove($id){
      DB::beginTransaction();
      $query = DB::table('consoleorder')
                   ->where('orderId', $id)
                   ->update(['status' => 'Sudah dikirim']);
      DB::commit();
      if(!$query){
        DB::rollback();
        return redirect()->back()->withErrors(['errors' => 'Failed to perform approve!']);
      }

      return redirect()->back();
    }

    static function gameReturnApprove($id){
      DB::beginTransaction();
      $query = DB::table('gameorder')
                   ->where('gameOrderId', $id)
                   ->update(['status' => 'Selesai']);

      DB::commit();
      if(!$query){
        DB::rollback();
        return redirect()->back()->withErrors(['errors' => 'Failed to perform approve!']);
      }

      return redirect()->back();
    }

    static function consoleReturnApprove($id){
      DB::beginTransaction();
      $query = DB::table('gameorder')
                   ->where('gameOrderId', $id)
                   ->where('status', 'Siap di Pick-up')
                   ->update(['status' => 'Selesai']);

      DB::commit();
      if(!$query){
        DB::rollback();
        return redirect()->back()->withErrors(['errors' => 'Failed to perform approve!']);
      }

      return redirect()->back();
    }

    static function getGameReturn(){
      $query = DB::table('gameorder')
                   ->join('game', 'gameorder.gameId', '=', 'game.GameID')
                   ->select('gameorder.*', 'game.NamaGame')
                   ->where('status', 'Siap di Pick-up')
                   ->get();

      return $query;
    }
    static function getConsoleReturn(){
      $query = DB::table('consoleorder')
                   ->join('console', 'consoleorder.consoleId', '=', 'console.ConsoleID')
                   ->select('consoleorder.*', 'console.NamaConsole')
                   ->where('status', 'Siap di Pick-up')
                   ->get();
      return $query;
    }

    static function getAllConsoleOrders(){
      $query = DB::table('consoleorder')
                  ->join('console', 'consoleorder.consoleId', '=', 'console.ConsoleID')
                  ->select('consoleorder.*', 'console.NamaConsole')
                  ->get();

      return $query;
    }

    static function getAllGameOrders(){
      $query = DB::table('gameorder')
                   ->join('game', 'gameorder.gameId', '=', 'game.GameID')
                   ->select('gameorder.*', 'game.NamaGame')
                   ->get();

      return $query;
    }

}
