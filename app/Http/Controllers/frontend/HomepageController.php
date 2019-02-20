<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Str;
use App\Http\Controllers\Controller;
use App\Post;
use App\Banner;
use App\Category;
use Auth;

class HomepageController extends Controller
{
    public function index()
    {   
        $cates = Category::all();
        $banner = Banner::where('status', 'Publish')->limit(5)->orderBy('created_at','DESC')->get();
        $berita = Post::where('status', 1)->orderBy('created_at','DESC')->paginate(6);
        return view('frontend.home', compact('berita','banner','cates'));
    }

    public function read($id)
    {    
        $cates = Category::all();
        $berita = Post::find($id);
        return view('frontend.single', compact('berita','cates'));
    }

    public function readbanner($id)
    {    
        $cates = Category::all();
        $berita = Banner::find($id);
        return view('frontend.banner', compact('berita','cates'));
    }

    public function category(Category $id)
    {
        $banner = Banner::where('status', 1)->limit(5)->orderBy('created_at','DESC')->get();
        $cates = Category::all();
        $berita = $id->posts();
        return view('frontend.home', compact('berita','banner','cates'));
    }

    public function categorycount()
    {
        $berita = Category::with('post')->get();
        return $berita;
    }
}
