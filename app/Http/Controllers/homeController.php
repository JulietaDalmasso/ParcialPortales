<?php

namespace App\Http\Controllers;

class HomeController extends Controller 
{
    public function home (){
        return view ('home');
    }

    public function servicios(){
        return view ('servicios');
    }

    public function blog(){
        return view ('blog');
    }
    public function contacto(){
        return view ('contacto');
    }
}