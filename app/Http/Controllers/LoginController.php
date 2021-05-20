<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginModel;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        return view("login");
    }

    public function login(){

    }

    public function register(){
      $response = request()->post();
      $fname = $response['fname'];
      $lname = $response['lname'];
      $email = $response['email'];
      $address = $response['address'];
      $phone = $response['phone'];
      $password = $response['password'];
      $confirmPassword = $response['password'];
      return LoginModel::register($fname, $lname, $email, $address, $phone, $password, $confirmPassword);
    }
}
