<?php

namespace App\Http\Controllers\Clients;

use App\Models\Blog;
use App\Models\Banner;
use App\Models\BlogCate;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        $slide = Banner::orderByDESC('id')->get();
        return view('clients.home')->with(compact('slide'));
    }
  
    public function blog(){
        $blogs = Blog::all();
        $blogs1 = Blog::all();
        $blogCate = BlogCate::all();
        $blogs2 = Blog::orderByDESC('id')->limit(5)->get();
        return view('clients.about.blog',[
            'blogs' => $blogs,
            'blogs1' => $blogs1,
            'blogCate' => $blogCate,
            'blogs2' => $blogs2
        ]);
    }
    public function homes()
    {
        dd('hh');
    }

    public function blogSingle($id){
        $blogCate = BlogCate::all();
        $blogs = Blog::orderByDESC('id')
        ->where('id', $id)->first();
        $blogs1 = Blog::orderByDESC('id')
        ->where('id_blogCate', $blogs->id_blogCate)->get();
        return view('clients.about.blog-single',[
            'blogs' => $blogs,
            'blogs1' => $blogs1,
        ]);
    }

    public function blogCategory($id){
        $blogCate = Blog::orderByDESC('id')
        ->where('id_blogCate', $id)->get();
        $blogCate1 = BlogCate::orderByDESC('id')
        ->where('id', $id)->first();
        return view('clients.about.blog-category',[
            'blogCate' => $blogCate,
            'blogCate1' => $blogCate1
        ]);;
    }

    public function contact(){
        $infors = Information::all();
        return view('clients.about.contact',[
            'infors' => $infors
        ]);
    }

    public function feedback(Request $request){
        $detail = [
            'title' => '',
            'pass' => ''
        ];
        Mail::to('nkokkenpro1995@gmail.com')->send(new SendMail($detail));

    }

    public function about(){
        return view('clients.about.about');
    }
   
}
