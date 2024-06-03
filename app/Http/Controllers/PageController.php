<?php


namespace App\Http\Controllers;


use App\Models\Page;

class PageController extends Controller
{
    public function __invoke(Page $page){
        //  dd(Menu::with('category')->with('children')->where(['active'=>true])->get());
      //  dd($page->parent)

        return view('page.index',['page'=>$page]);
    }
}
