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
                      ->where('status', '<>', 'Selesai')
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

    //Reducing qty
    $stockReady = $stockReady - 1;

    DB::table('game')
        ->where('GameID', $gameId)
        ->update(['qtyReady' => $stockReady]);

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

  static function addConsoleToCart($consoleId, $userEmail, $hari){
    //Check if user already ordered game
    $checkOrder = DB::table('consoleorder')
                      ->where('email', $userEmail)
                      ->where('consoleId', $consoleId)
                      ->where('status', '<>', 'Selesai')
                      ->count();
    if($checkOrder > 0) return redirect()->back()->withErrors(['errors' => 'Cant add to cart : you already rented this console']);

    //Check if stock is ready
    $stockReadyQ = DB::table('console')
                      ->where('ConsoleID', $consoleId)
                      ->get();

    $stockReady = null;
    foreach ($stockReadyQ as $s) {
      $stockReady = $s->qtyReady;
    }
    if($stockReady == null) return redirect()->back()->withErrors(['errors' => 'Cant add to cart : Unknown GameID']);
    if($stockReady <= 0) return redirect()->back()->withErrors(['errors' => 'Cant add to cart : No item are ready at the moment']);

    //Get harga
    $hargaQ = DB::table('console')
                  ->where('ConsoleID', $consoleId)
                  ->get();

    $harga = null;
    foreach ($hargaQ as $h) {
      $harga = $h->harga;
    }
    if($harga == null) return redirect()->back()->withErrors(['errors' => 'Cant add to cart : Unknown GameID']);

    $harga = $harga * $hari;

    //Reducing qty
    $stockReady = $stockReady - 1;

    DB::table('console')
        ->where('ConsoleID', $consoleId)
        ->update(['qtyReady' => $stockReady]);

    //All set, lets get today date

    $todayDate = date("Y-m-d");
    $endDate = date("Y-m-d", strtotime($hari.' day'));

    DB::beginTransaction();
    $query = DB::table('consoleorder')
             ->insert([
               'orderId' => (int) '',
               'email' => $userEmail,
               'consoleId' => $consoleId,
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

  /*==================================
  USER CART FUNCTION
  ==================================*/

  //Get user cart

  static function getConsoleCart($email){
    $consoleQuery = DB::table('consoleorder')
                        ->where('email', $email)
                        ->join('console', 'consoleorder.consoleId', '=', 'console.ConsoleID')
                        ->select('consoleorder.*', 'console.NamaConsole', 'console.deskripsi', 'console.gambar')
                        ->get();

    return $consoleQuery;
  }

  static function getGameCart($email){
    $gameQuery = DB::table('gameorder')
                        ->where('email', $email)
                        ->join('game', 'gameorder.gameId', '=', 'game.GameID')
                        ->select('gameorder.*', 'game.NamaGame', 'game.deskripsi', 'game.gambar')
                        ->get();

    return $gameQuery;
  }

  //Siap di pickup>>>

  static function returnGame($email, $id){
    //Lets make sure that such email and id is valid
    $count = DB::table('gameorder')
                 ->where('email', $email)
                 ->where('gameOrderId', $id)
                 ->count();
    //if the count is 0 we can sure the GET call is false and NG

    if($count == 0) return redirect()->back()->withErrors(['errors' => 'Error : order not found']);

    //Get order status, they maybe forced it
    //Check if order status is "Sudah dikirim"

    $orderStatusQuery = DB::table('gameorder')
                            ->where('email', $email)
                            ->where('gameOrderId', $id)
                            ->get();

    $orderStatus = null;
    $consoleId = null;
    foreach ($orderStatusQuery as $o) {
      $orderStatus = $o->status;
      $gameId = $o->gameId;
    }

    if($orderStatus == null) return redirect()->back()->withErrors(['errors' => 'Error : unknown error']);
    if($orderStatus !== "Sudah dikirim") return redirect()->back()->withErrors(['errors' => 'Error : invalid status!']);

    //get qty
    $stockReadyQ = DB::table('game')
                      ->where('GameID', $gameId)
                      ->get();

    $stockReady = null;
    foreach ($stockReadyQ as $s) {
      $stockReady = $s->qtyReady;
    }

    $stockReady = $stockReady + 1;

    //All set nothing is sus

    DB::beginTransaction();

    $query = DB::table('gameorder')
                 ->where('email', $email)
                 ->where('gameOrderId', $id)
                 ->update(['status' => 'Siap di Pick-up']);

    $qtyQuery = DB::table('game')
                    ->where('GameID', $gameId)
                    ->update(['qtyReady' => $stockReady]);

    DB::commit();
    if(!$query or !$qtyQuery){
      DB::rollback();
      return redirect()->back()->withErrors(['errors' => 'Error : unknown error']);
    }

    return redirect()->back();
  }

  static function returnConsole($email, $id){
    //Lets make sure that such email and id is valid
    $count = DB::table('consoleorder')
                 ->where('email', $email)
                 ->where('orderId', $id)
                 ->count();
    //if the count is 0 we can sure the GET call is false and NG

    if($count == 0) return redirect()->back()->withErrors(['errors' => 'Error : order not found']);

    //Get order status, they maybe forced it
    //Check if order status is "Sudah dikirim"

    $orderStatusQuery = DB::table('consoleorder')
                            ->where('email', $email)
                            ->where('orderId', $id)
                            ->get();

    $orderStatus = null;
    $consoleId = null;
    foreach ($orderStatusQuery as $o) {
      $orderStatus = $o->status;
      $consoleId = $o->consoleId;
    }

    if($orderStatus == null) return redirect()->back()->withErrors(['errors' => 'Error : unknown error']);
    if($orderStatus !== "Sudah dikirim") return redirect()->back()->withErrors(['errors' => 'Error : invalid status!']);

    //get qty
    $stockReadyQ = DB::table('console')
                      ->where('ConsoleID', $consoleId)
                      ->get();

    $stockReady = null;
    foreach ($stockReadyQ as $s) {
      $stockReady = $s->qtyReady;
    }

    $stockReady = $stockReady + 1;

    //All set nothing is sus

    DB::beginTransaction();

    $query = DB::table('consoleorder')
                 ->where('email', $email)
                 ->where('orderId', $id)
                 ->update(['status' => 'Siap di Pick-up']);

    $qtyQuery = DB::table('console')
                  ->where('ConsoleID', $consoleId)
                  ->update(['qtyReady' => $stockReady]);

    DB::commit();
    if(!$query or !$qtyQuery){
      DB::rollback();
      return redirect()->back()->withErrors(['errors' => 'Error : unknown error']);
    }

    return redirect()->back();
  }


  static function consoleTemp($email, $id){
    $queryCheck = DB::table('tempcartconsole')
                    ->where('email', $email)
                    ->where('consoleId', $id)
                    ->count();
    if($queryCheck > 0) return redirect()->back()->withErrors(['errors' => 'You already ordered this item!']);
    DB::beginTransaction();
    $query = DB::table('tempcartconsole')
               ->insert([
                 'email' => $email,
                 'consoleId' => $id
               ]);
    DB::commit();
    if(!$query){
      DB::rollback();
      return redirect()->back()->withErrors(['errors' => 'Unknown error']);
    }

    return redirect('/cart');
  }

  static function gameTemp($email, $id){
    $queryCheck = DB::table('tempcartgame')
                    ->where('email', $email)
                    ->where('idGame', $id)
                    ->count();
    if($queryCheck > 0) return redirect()->back()->withErrors(['errors' => 'You already ordered this item!']);
    DB::beginTransaction();
    $query = DB::table('tempcartgame')
               ->insert([
                 'email' => $email,
                 'idGame' => $id
               ]);
    DB::commit();
    if(!$query){
      DB::rollback();
      return redirect()->back()->withErrors(['errors' => 'Unknown error']);
    }

    return redirect('/cart');
  }

}
