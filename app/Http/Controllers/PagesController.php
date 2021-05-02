<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        $names = ["Peeter", "John", "Hesus", "David"];
        return view('about', [
            'names' => $names
        ]);
    }
}
