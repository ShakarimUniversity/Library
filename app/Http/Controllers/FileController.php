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

//        $categories= Http::get('https://api.semgu.kz/ebooks/types.php')->object();
//        foreach ($categories as $item){
//            $model = new BookCategory();
//            $model->name_kz = $item->namekz;
//            $model->name_ru = $item->nameru;
//            $model->save();
//        }
//        $data = Http::get('https://api.semgu.kz/ebooks/index.php',[
//            'type' => 1
//        ])->object();
//
//                foreach ($data as $item){
//            $model = new Book();
//            $model->category_id = $item->typeid;
//            $model->book_name = Str::limit($item->bookname, 251, '...');
//                    $model->file_name = 'ebooks/'.$item->typeid.'/'.$item->filename;
//                    $model->author = $item->author;
//                    $model->isbn = $item->isbn;
//                    $model->created_at = $item->createdate;
//            $model->save();
//        }

        $books = Book::all();
        foreach ($books as $book) {
            $categoryFolder = "ebooks/{$book->category_id}";
            $year = date('Y', strtotime($book->created_at));
            $sourcePath = "ebooks/".$year."/".basename($book->file_name);
            $destinationPath = $categoryFolder."/".basename($book->file_name);
            if(Storage::disk('public')->exists($sourcePath)){
                Storage::disk('public')->move($sourcePath, $destinationPath);
            }
          //  dd($sourcePath);
          //  dd(Storage::disk('public')->exists($sourcePath));
//            $destinationPath = $categoryFolder."/".basename($book->file_name);
//
//
//            // Создать папку для категории, если ее нет
//            if (!Storage::disk('public')->exists($categoryFolder)) {
//                Storage::disk('public')->makeDirectory($categoryFolder);
//            }
//
//            // Переместить файл в соответствующую папку
//            if (Storage::disk('public')->exists($sourcePath)) {
//                Storage::disk('public')->move($sourcePath, $destinationPath);
//            } else {
//                echo "Файл не найден в папке ebooks\n";
//            }
        }

                dd('test');

        return view('file.index');
    }

    public function show($id){

        return view('file.show',compact('id'));
    }

    public function getPdf(Request $request, $fileId)
    {
        $book = Book::query()->select('file_name')->where('id',$fileId)->first();

        $path = storage_path('app/public/ebooks/' . $book->file_name);
       // dd(file_exists($path));
        // Проверяем существование файла
        if (!file_exists($path)) {
            abort(404);
        }

        // Читаем содержимое файла
        $content = file_get_contents($path);

        $fileSize = filesize($path);
        // Возвращаем ответ с правильными заголовками
        return response($content)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Length', $fileSize)
            ->header('Content-Disposition', 'inline; filename="' . $book->file_name . '"')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
            ->header('Pragma', 'no-cache')
            ->header('X-Frame-Options', 'SAMEORIGIN')
            ->header('X-Content-Type-Options', 'nosniff');
    }
}
