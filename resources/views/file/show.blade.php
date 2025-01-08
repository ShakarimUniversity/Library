<!DOCTYPE html>
<html>
<head>
    <title>PDF Viewer</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
    </script>
    <style>
        #pdf-container {
            width: 100%;
            height: 100vh;
            overflow: auto;
            position: relative;
        }
        #pdf-canvas {
            border: 1px solid black;
            margin: 0 auto;
            display: block;
        }
        .controls {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .loading-container {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }
        .loading-text {
            font-family: Arial, sans-serif;
            font-size: 18px;
            color: #333;
        }
        .progress-text {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
<div id="loading" class="loading-container">
    <div class="loading-spinner"></div>
    <div class="loading-text">Загрузка PDF...</div>
    <div id="progress-text" class="progress-text">0%</div>
</div>

<div id="pdf-container">
    <canvas id="pdf-canvas"></canvas>
</div>
<div class="controls">
    <button onclick="prevPage()">Предыдущая</button>
    <span id="page-num"></span> / <span id="page-count"></span>
    <button onclick="nextPage()">Следующая</button>
</div>

<script>
    let pdfDoc = null,
        pageNum = 1,
        pageRendering = false,
        pageNumPending = null,
        scale = 1.5,
        canvas = document.getElementById('pdf-canvas'),
        ctx = canvas.getContext('2d');

    function renderPage(num) {
        pageRendering = true;
        pdfDoc.getPage(num).then(function(page) {
            let viewport = page.getViewport({scale: scale});
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            let renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };

            let renderTask = page.render(renderContext);

            renderTask.promise.then(function() {
                pageRendering = false;
                if (pageNumPending !== null) {
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }
            });
        });

        document.getElementById('page-num').textContent = num;
    }

    function queueRenderPage(num) {
        if (pageRendering) {
            pageNumPending = num;
        } else {
            renderPage(num);
        }
    }

    function prevPage() {
        if (pageNum <= 1) {
            return;
        }
        pageNum--;
        queueRenderPage(pageNum);
    }

    function nextPage() {
        if (pageNum >= pdfDoc.numPages) {
            return;
        }
        pageNum++;
        queueRenderPage(pageNum);
    }

    // Загрузка PDF с отслеживанием прогресса
    const loadingTask = pdfjsLib.getDocument('{{ route("get.pdf", ["fileId" => $id]) }}');

    loadingTask.onProgress = function(progress) {
        const percent = Math.round((progress.loaded / progress.total) * 100);
        document.getElementById('progress-text').textContent = `${percent}%`;
    };

    loadingTask.promise.then(function(pdfDoc_) {
        pdfDoc = pdfDoc_;
        document.getElementById('page-count').textContent = pdfDoc.numPages;

        // Скрываем индикатор загрузки
        document.getElementById('loading').style.display = 'none';

        renderPage(pageNum);
    }).catch(function(error) {
        // Показываем ошибку пользователю
        document.getElementById('loading').innerHTML = `
                <div class="loading-text" style="color: red;">
                    Ошибка загрузки PDF: ${error.message}
                </div>`;
    });
</script>
</body>
</html>
