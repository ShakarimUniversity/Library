<?php

namespace App\Http\Controllers;

use App\Models\CategoryLibFile;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __invoke(){

       // $categories = CategoryLibFile::with('childs')->where('parent_id',0)->get();

        return view('file.index');
    }
}
