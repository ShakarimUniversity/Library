<div class="bg-white rounded-md overflow-hidden shadow-lg p-4 mx-2 md:mx-0">
    <p class="mb-2 py-2 border-b">НОВЫЕ ПОСТУПЛЕНИЯ</p>
    <div class="swiper-container new-books-slider h-[1200px] overflow-hidden">
        <div class="swiper-wrapper">
            @foreach($covers as $cover)
                <div class="swiper-slide">
                    <img class="w-full h-auto cover" src="{{ $cover->getImage() }}" alt="book">
                </div>
            @endforeach
        </div>
    </div>
</div>
