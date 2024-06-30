<?php

namespace App\Http\Controllers;

use App\Models\PublicationsData;
use Illuminate\Http\Request;

class PublicationsDatabaseController extends Controller
{
    public function show(PublicationsData $publicationsData){

        return view('publications-data.show',compact('publicationsData'));
    }
}
