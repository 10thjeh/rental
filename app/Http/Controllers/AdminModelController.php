<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Http\Controllers\URL;

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
      return $id;
    }

    function orders(){
      echo "orders";
    }

    function console(){
      $consoles = AdminModel::getConsoles();
      return view('adminconsoles',['consoles'=>$consoles]);
    }
}
