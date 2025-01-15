<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\CategoryLibFile;
use App\Models\LibFile;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;

class LibFiles extends Component
{
    use WithPagination;

    public $categories;
    public $category_id = null;
    public $search = '';

    public $perPage = 20;

    public function mount()
    {
        $this->categories = BookCategory::all();
    }

    public function selectCategory($id)
    {
        $this->category_id = $id;
        $this->search = '';
        $this->resetPage();
    }

    public function render()
    {
        if($this->category_id===null){
            $this->category_id = $this->categories[0]->id;
        }

        $files = Book::select('id','category_id','book_name','file_name','author')
            ->where('category_id',$this->category_id)
            ->search($this->search)
            ->paginate($this->perPage);

        return view('livewire.lib-files',compact('files'));
    }
}
