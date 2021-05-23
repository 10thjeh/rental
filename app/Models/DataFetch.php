<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataFetch extends Model
{
    static function getConsoles(){
      $query = DB::table('console')->get();
      return $query;
    }

    static function getGames(){
      $query = DB::table('game')->get();
      return $query;
    }

    static function getGenres(){
      $query = DB::table('genredetails')->orderBy('genreName', 'asc')->get();
      return $query;
    }

    static function getConsoleByManufacturer($manufacturer){
      // if($manufacturer = '') return DB::table('console')->get();
      $legitManufacturer = ['sony', 'microsoft', 'nintendo'];
      if(!in_array($manufacturer, $legitManufacturer)) return DB::table('console')->get();
      $query = DB::table('console')
                   ->where('manufacturer', $manufacturer)
                   ->get();
      return $query;
    }

    static function getGamesByGenre($genreId){
      $query = DB::table('genre')
                   ->join('game', 'genre.idGame', '=', 'game.GameID')
                   ->select('game.*')
                   ->where('genreId', $genreId)
                   ->get();
      return $query;
    }

}
