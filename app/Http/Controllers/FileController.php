<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\CategoryLibFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function index(){

        return view('file.index');
    }

    public function show($id){

        return view('file.show',compact('id'));
    }

    public function getPdf(Request $request, $fileId)
    {
        $book = Book::query()->select('file_name')->where('id',$fileId)->first();

        $path = storage_path('app/public/' . $book->file_name);

        if (!file_exists($path)) {
            abort(404);
        }

        $fileSize = filesize($path);

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $book->file_name . '"',
            'Cache-Control' => 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0',
            'Pragma' => 'no-cache',
            'Content-Length' => $fileSize,
            'X-Frame-Options' => 'SAMEORIGIN',
            'X-Content-Type-Options' => 'nosniff',
        ]);

    }
}
