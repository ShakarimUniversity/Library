<?php


namespace App\Http\Controllers;


use App\Models\Post;

class NewsController extends Controller
{
    public function index(){

     //   dd(app()->getLocale());

        $posts = Post::with('categories')->where('language',app()->getLocale())->where('active',true)->paginate(10);

        return view('news.index',compact('posts'));
    }

    public function show(Post $post){

        return view('news.show',compact('post'));
    }
}
