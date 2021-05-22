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
      $query = DB::table('games')->get();
      return $query;
    }

    static function getGenres(){
      $query = DB::table('genredetails')->get();
      return $query;
    }

    static function getConsoleByManufacturer($manufacturer){
      $legitManufacturer = ['sony', 'microsoft', 'nintendo'];
      if(!in_array($manufacturer, $legitManufacturer)) return redirect()->route('home');

      $query = DB::table('console')
                   ->where('manufacturer', $manufacturer)
                   ->get();

      return $query;
    }

}
