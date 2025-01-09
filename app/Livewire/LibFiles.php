<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\CategoryLibFile;
use App\Models\LibFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class LibFiles extends Component
{
    public $categories;
    public $files;
    public $category_id = null;

    public function mount()
    {
        $this->categories = BookCategory::all();
        if($this->categories){
            $this->category_id = $this->categories[0]->id;
            $this->files = Book::query()->where('category_id',$this->category_id)->get();
        }

    }

    public function selectCategory($id)
    {
        $this->files = Book::query()->where('category_id',$id)->get();
    }

    public function render()
    {
        return view('livewire.lib-files');
    }
}
