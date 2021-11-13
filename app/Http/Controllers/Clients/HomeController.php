<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('clients.home');
    }

    public function blog(){
        return view('clients.about.blog');
    }

    public function contact(){
        return view('clients.about.contact');
    }

    public function about(){
        return view('clients.about.about');
    }
}
