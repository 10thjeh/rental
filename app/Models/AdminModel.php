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
}
