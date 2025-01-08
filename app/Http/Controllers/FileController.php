<?php

namespace App\Http\Controllers;

use App\Models\CategoryLibFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

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
        try {
            // Проверяем есть ли файл в кеше
            $cacheKey = "pdf_file_{$fileId}";

            if (Cache::has($cacheKey)) {
                $fileContent = Cache::get($cacheKey);
            } else {
                // Получаем файл с внешнего сервера
                $response = Http::withHeaders([
                    'Accept' => 'application/pdf'
                ])->get("https://api.semgu.kz/ebooks/view.php",['id'=>$fileId]);

                if (!$response->successful()) {
                    return response()->json([
                        'error' => 'Failed to fetch PDF from external server'
                    ], $response->status());
                }

                $fileContent = $response->body();

                // Кешируем файл на короткое время
                Cache::put($cacheKey, $fileContent, now()->addMinutes(5));
            }

            // Возвращаем PDF с правильными заголовками
            return response($fileContent)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="document.pdf"')
                ->header('Content-Length', strlen($fileContent))
                ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
                ->header('Pragma', 'no-cache')
                ->header('X-Frame-Options', 'SAMEORIGIN')
                ->header('X-Content-Type-Options', 'nosniff');

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to process PDF file',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
