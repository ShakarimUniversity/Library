<?php


namespace App\Http\Controllers;


use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index(){

        $announcements = Announcement::where('language',app()->getLocale())->paginate(20);

        return view('announcement.index',compact('announcements'));
    }

    public function show(Announcement $announcement){

    //    dd($announcement);

        return view('announcement.show',compact('announcement'));
    }
}
