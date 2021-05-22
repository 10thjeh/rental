<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFetch;


class ConsoleController extends Controller
{
    public function index(){
        DataFetch::getConsoles();
        $consoles = DataFetch::getConsoles();
        return view('console',['consoles' => $consoles]);
    }
}
