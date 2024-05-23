<?php


namespace App\Http\Controllers;


use App\Models\Post;

class NewsController extends Controller
{
    public function index(){

        $posts = Post::with('categories')->paginate(20);

        return view('news.index',compact('posts'));
    }

    public function show(Post $post){

        return view('news.show',compact('post'));
    }
}
