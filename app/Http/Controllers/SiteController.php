<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Menu;
use App\Models\Post;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __invoke(){

       // dd(\App\Models\Menu::with(['category','children','page'])->where(['active'=>true,'category_id'=>1])->where('parent_id','=',NULL)->get());

        $news = Post::with('categories')->where('language',app()->getLocale())->limit(4)->get();
        $announcements = Announcement::where('language',app()->getLocale())->limit(4)->get();

       // dd(\App\Models\BookCover::orderBy('created_at','desc')->limit(5)->get());
      //  dd(count($news));
        return view('site.index',compact('news','announcements'));
    }
}
