<?php

namespace App\Http\Controllers\Clients;

use App\Models\Blog;
use App\Models\Brand;
use App\Mail\SendMail;
use App\Models\Banner;
use App\Models\Product;
use App\Models\BlogCate;
use App\Models\Wishlist;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    public function index(){
        $slide = Banner::orderByDESC('id')->where('banner_type', '0')->get();
        $banner = Banner::orderByDESC('id')->where('banner_type', '1')->get();
        $product = Product::orderByDESC('id')->get();
        $highlight = Product::orderByDESC('id')->get();
        $brand = Brand::orderByDESC('id')->get();
        return view('clients.home')->with([
            'slide' => $slide,
            'product' => $product,
            'highlight' => $highlight,
            'brand' => $brand,
            'banner' => $banner
        ]);
    }

    public function blog(){
        $blogs = Blog::orderByDESC('id')
        ->where('blog_status', 1)->get();
        $blogs1 = Blog::orderByDESC('id')
        ->where('blog_status', 1)->get();
        $blogCate = BlogCate::all();
        $blogs2 = Blog::orderByDESC('id')
        ->where('blog_status', 1)->limit(5)->get();
        return view('clients.about.blog',[
            'blogs' => $blogs,
            'blogs1' => $blogs1,
            'blogCate' => $blogCate,
            'blogs2' => $blogs2
        ]);
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
            'blogCate' => $blogCate
        ]);
    }

    public function blogCategory($id){
        $blogCate = Blog::orderByDESC('id')
        ->where('blog_status', 1)
        ->where('id_blogCate', $id)->get();
        $blogCate1 = BlogCate::orderByDESC('id')
        ->where('id', $id)->first();
        return view('clients.about.blog-category',[
            'blogCate' => $blogCate,
            'blogCate1' => $blogCate1
        ]);;
    }

    public function contact(){
        $infors = Information::orderByDESC('id')
        ->where('infor_status', 1)->get();
        return view('clients.about.contact',[
            'infors' => $infors
        ]);
    }

    public function feedback(Request $request){
        $infors = Information::all();
        $detail = [
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'email' => $request->email,
            'title' => $request->title,
            'message' => $request->message,
            'day_send' => date("d/m/Y")
        ];
        Mail::to('bigdealdn@gmail.com')->send(new SendMail($detail));
        return view('clients.about.contact',[
            'infors' => $infors
        ]);

    }

    public function about(){
        return view('clients.about.about');
    }

}
