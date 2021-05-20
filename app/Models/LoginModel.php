<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginModel extends Model
{
    static function register($fname, $lname, $email, $address, $phone, $password, $confirmPassword){
      //no need to escape the input anymore, the querybuilder is here
      //but lets check some inputs
      //password == confirmPassword?
      if($password != $confirmPassword) die('password ga sama');// return back()->withInput();
      //check if number is numeric
      if(!is_numeric($phone)) die('telpon ga nomer'); //return back()->withInput();
      //check if email is, email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) die('email gabener'); //return back()->withInput();
      //Laravel provides validation but sudah terlanjur pake ginian

      //Hash the password
      $password = Hash::make($password);

      //Now all we need is insert to db

      DB::beginTransaction();
      $query = DB::table('users')->insert([
        'email' => $email,
        'password' => $password,
        'firstName' => $fname,
        'lastName' => $lname,
        'alamat' => $address,
        'telepon' => $phone,
        'role' => 'user'
      ]);
      DB::commit();
      if(!$query){
        DB::rollback();
        return back()->withInput();
      }

      return redirect()->route('home');

    }
}
