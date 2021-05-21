<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    static function authAdmin(){
      if(session('role')!== "admin"){
        redirect()->route('home');
      }
    }

    static function authUser(){

    }

}
