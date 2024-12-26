<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\DatabaseList;
use App\Models\Menu;
use App\Models\Post;
use App\Models\PublicationsDataCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function __invoke(){

       // dd(\App\Models\Menu::with(['category','children','page'])->where(['active'=>true,'category_id'=>1])->where('parent_id','=',NULL)->get());

        $news = Post::with('categories')->where('language',app()->getLocale())->where('active',true)->limit(4)->get();
        $announcements = Announcement::where('language',app()->getLocale())->where('active',true)->limit(4)->get();

        $publicationsDataCategory = PublicationsDataCategory::with('publications')->get();

//        $databaseList = DatabaseList::all()->groupBy(function($databaseList) {
//            return $databaseList->initial;
//        });

        $databaseList = Cache::remember('databaseList',120,function(){
            return DatabaseList::orderBy('initial')->get()->groupBy(function($databaseList) {
                return $databaseList->initial;
            });
        });
        $databaseListCount = Cache::remember('databaseListCount',120,function(){
            return DatabaseList::count();
        });

       // dd($databaseListCount);

//        dd(DatabaseList::all()->groupBy(function($databaseList) {
//            return $databaseList->initial;
//        }));

       // dd($databaseList);
       // dd(\App\Models\BookCover::orderBy('created_at','desc')->limit(5)->get());
      //  dd(count($news));
        return view('site.index',compact('news','announcements','publicationsDataCategory','databaseList','databaseListCount'));
    }
}
