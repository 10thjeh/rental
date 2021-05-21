<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    static function authAdmin(){
      return (session('role')!== "admin");
    }

    static function authUser(){

    }

}
