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
            // Инициализируем запрос к внешнему API
            $response = Http::withHeaders([
                'Accept' => 'application/pdf'
            ])
                ->withOptions([
                    'stream' => true,  // Включаем потоковую передачу
                    'timeout' => 0     // Отключаем таймаут для больших файлов
                ])
                ->get("https://api.semgu.kz/ebooks/view.php",['id'=>$fileId]);

            if (!$response->successful()) {
                return response()->json([
                    'error' => 'Failed to fetch PDF from external server'
                ], $response->status());
            }

            // Получаем размер файла, если сервер его предоставляет
            $contentLength = $response->header('Content-Length');

            // Настраиваем заголовки ответа
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="document.pdf"',
                'Cache-Control' => 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0',
                'Pragma' => 'no-cache',
                'X-Frame-Options' => 'SAMEORIGIN',
                'X-Content-Type-Options' => 'nosniff'
            ];

            if ($contentLength) {
                $headers['Content-Length'] = $contentLength;
            }

            // Создаем потоковый ответ
            return response()->stream(
                function () use ($response) {
                    // Получаем поток данных
                    $stream = $response->toPsrResponse()->getBody()->detach();

                    // Читаем и отправляем данные небольшими частями
                    while (!feof($stream)) {
                        echo fread($stream, 8192); // Читаем по 8KB за раз
                        flush();
                    }

                    // Закрываем поток
                    fclose($stream);
                },
                200,
                $headers
            );

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to process PDF file',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
