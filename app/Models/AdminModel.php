<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    static function submitGameChanges($gameId, $namaGame, $platform, $qty, $genre){
      //We need to remove all genre before adding new genre
      DB::table('genre')->where('idGame', $gameId)->delete();
      //then iteratively begin to add to the database
      foreach ($genre as $g) {
        DB::table('genre')->insert(['idGame' => $gameId, 'genreId' => $g]);
      }
      //now the real shit begin
      DB::beginTransaction();
      $query = DB::table('game')
              ->where('GameID', $gameId)
              ->update(['NamaGame' => $namaGame, 'platform' => $platform, 'qty' => $qty]);
      DB::commit();
      if(!$query){
        DB::rollback();
        return back()->withInput();
      }

      return redirect()->route('games');
    }
}
