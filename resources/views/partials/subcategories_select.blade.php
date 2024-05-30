@foreach($categories as $category)
    <option value="{{ $category->cat_id }}">{{ $prefix }} {{ $category->cat_title }}</option>
    @if($category->children->count() > 0)
        @include('partials.subcategories_select', ['categories' => $category->children, 'prefix' => $prefix.'--'])
    @endif
@endforeach

<div>
    @if($files)
        {{ $files }}
        <table>

        </table>
    @endif
</div>
