<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartModel extends Model
{
  static function addGameToCart($gameId, $userEmail, $hari){
    //Check if user already ordered game
    $checkOrder = DB::table('gameorder')
                      ->where('email', $userEmail)
                      ->where('gameId', $gameId)
                      ->count();
    if($checkOrder > 0) return redirect()->back()->withErrors(['errors' => 'Cant add to cart : you already rented this game']);

    //Check if stock is ready
    $stockReadyQ = DB::table('game')
                      ->where('GameID', $gameId)
                      ->get();

    $stockReady = null;
    foreach ($stockReadyQ as $s) {
      $stockReady = $s->qtyReady;
    }
    if($stockReady == null) return redirect()->back()->withErrors(['errors' => 'Cant add to cart : Unknown GameID']);
    if($stockReady <= 0) return redirect()->back()->withErrors(['errors' => 'Cant add to cart : No item are ready at the moment']);

    //Get harga

    $hargaQ = DB::table('game')
                  ->where('GameID', $gameId)
                  ->get();

    $harga = null;
    foreach ($hargaQ as $h) {
      $harga = $h->harga;
    }
    if($harga == null) return redirect()->back()->withErrors(['errors' => 'Cant add to cart : Unknown GameID']);

    $harga = $harga * $hari;
    //All set, lets get today date

    $todayDate = date("Y-m-d");
    $endDate = date("Y-m-d", strtotime($hari.' day'));

    DB::beginTransaction();
    $query = DB::table('gameorder')
             ->insert([
               'gameOrderId' => (int) '',
               'email' => $userEmail,
               'gameId' => $gameId,
               'harga' => $harga,
               'hari' => $hari,
               'startDate' => $todayDate,
               'endDate' => $endDate,
               'status' => 'Sedang dikirim'
             ]);
    DB::commit();
    if(!$query){
      DB::rollback();
      return redirect()->back()->withErrors(['errors' => 'Cant add to cart : unknown error']);
    }

    return redirect()->back();
  }

  static function addConsoleToCart($consoleId, $userEmail){

  }
}
