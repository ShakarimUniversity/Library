<div>
    <div class="flex items-start justify-between p-4 border-b rounded-t">
        <h1 class="mb-2  text-lg font-semibold">{{ $bookCover->title }}</h1>
        <button wire:click="$dispatch('closeModal', { component: 'book-view' })" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 p-4">
        <div class="md:col-span-1">
            <img class="w-full h-auto cover cursor-pointer" src="{{ $bookCover->getImage() }}" alt="cover">
        </div>
        <div class="px-6 md:col-span-2">
            <div class="mb-4">
                {!! $bookCover->description !!}
            </div>
            <button class="max-w-fit border border-strong-blue text-strong-blue focus:border-strong-blue ring-strong-blue rounded-md px-4 py-2">Читать</button>
        </div>

    </div>
</div>
