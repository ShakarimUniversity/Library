@props([
'lists',
])
<div>
    <ul>
    @foreach ($lists as $item)
    <li class="mb-6">
        <div class="flex flex-col md:flex-row rounded-xl overflow-hidden bg-secondary">
            @if ($item->image)
             <img class="w-48 mx-auto md:mx-0" src="{{ $item->getImage() }}" alt="image">
            @endif
             <div class="pl-6 py-4">
            <a class="font-semibold text-strong-blue text-lg mb-4" href="{{$item->getFile()}}"> {{ $item->{'title_'.app()->getLocale()} }}</a>
            <hr class="my-2">
            <div class="tiptap-content text-2xl text-light mb-2">
                {!! $item->{'description_'.app()->getLocale()} !!}
            </div>
        </div>
        </div>
    </li>
    @endforeach
</ul>
{{ $lists->links() }}
</div>
