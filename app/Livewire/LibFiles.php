<?php

namespace App\Livewire;

use App\Models\CategoryLibFile;
use App\Models\LibFile;
use Livewire\Component;

class LibFiles extends Component
{
    public $categories;
    public $files;
    public $category_id = null;

    public function mount()
    {
        $this->categories = CategoryLibFile::with('children')->where('parent_id', 0)->get();
    }

    public function selectCategory($id)
    {
      //  dd($id);
        $this->files = LibFile::where('cat_id',$id)->get();
    }

    public function render()
    {
        return view('livewire.lib-files');
    }
}
