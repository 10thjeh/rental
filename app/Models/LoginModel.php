<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginModel extends Model
{
    static function register($fname, $lname, $email, $address, $phone, $password, $confirmPassword){
      //no need to escape the input anymore, the querybuilder is here
      //but lets check some inputs
      //password == confirmPassword?
      if($password != $confirmPassword) return redirect()->back()->withErrors(['errors' => 'Password does not match']);
      //check if number is numeric
      if(!is_numeric($phone)) return redirect()->back()->withErrors(['errors' => 'Phone only accepts numeric']);
      //check if email is, email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return redirect()->back()->withErrors(['errors' => 'Illegal Email format']);
      //Check if password length is more than 8
      if(strlen($password) < 8) return redirect()->back()->withErrors(['errors' => 'Password length need to more or equal than 8']);
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

    static function login($email, $password){
      //Should we worry about sql injection?
      //No, probably. Just believe to querybuilder
      //whats the point of querybuilder if that thing doesnt protect sql injection?

      //Checking user in laravel is kinda, something
      //First, let get the hashed password

      $correctPasswordQuery = DB::table('users')->where('email', $email)->get();
      //Not even registered? smh
      if(count($correctPasswordQuery) <= 0) return redirect()->back()->withErrors(['errors' => 'Invalid credentials!']);
      foreach ($correctPasswordQuery as $p) {
        $hashedPassword = $p->password;
        $role = $p->role;
        $userObj = $p;
      }

      //Then let Hash do the job
      if(Hash::check($password, $hashedPassword)) {
        //Set session

        session()->put('isLoggedIn',True);
        session()->put('userObject', $userObj);
        session()->put('firstName', $userObj->firstName);
        session()->put('lastName', $userObj->lastName);
        session()->put('role', $userObj->role);

        //if admin then redirect to admin page
        if(strcmp($userObj->role, "admin") == 0) return redirect()->route('admin');

        return redirect()->route('home');
      }

      return redirect()->back()->withErrors(['errors' => 'Invalid credentials!']);

    }

    static function logout(){
      session()->flush();
      return redirect()->route('home');
    }
}
