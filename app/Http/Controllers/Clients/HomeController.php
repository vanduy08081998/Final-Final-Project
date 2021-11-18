<?php

namespace App\Http\Controllers\Clients;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('clients.home');
    }

    public function blog(){
        $blogs = Blog::all();
        $blogs1 = Blog::all();
        return view('clients.about.blog',[
            'blogs' => $blogs,
            'blogs1' => $blogs1
        ]);
    }

    public function blogSingle($id){
        $blogs = Blog::orderByDESC('id')
        ->where('id', $id)->first();
        return view('clients.about.blog-single',[
            'blogs' => $blogs
        ]);;
    }

    public function contact(){
        return view('clients.about.contact');
    }

    public function about(){
        return view('clients.about.about');
    }
}
