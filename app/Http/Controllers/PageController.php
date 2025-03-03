<?php


namespace App\Http\Controllers;


use App\Models\Page;
use App\Models\PageList;

class PageController extends Controller
{
    public function __invoke(Page $page){
        //  dd(Menu::with('category')->with('children')->where(['active'=>true])->get());
      //  dd($page->parent)
        $page->load('pageLists');

        $lists = PageList::query()->where('page_id',$page->id)->orderBy('id', 'desc')->paginate(10);;

        return view('page.index',['page'=>$page,'lists'=>$lists]);
    }
}
