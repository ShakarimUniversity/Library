<?php

namespace App\Livewire;

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
        $this->categories = Cache::remember('files_categories', now()->addDays(1), function() {
            return Http::get('https://api.semgu.kz/ebooks/types.php')->object();
        });
        if($this->categories){
            $this->category_id = $this->categories[0]->typeid;
            $this->files = Http::get('https://api.semgu.kz/ebooks/index.php',[
                'type' => $this->category_id
            ])->object();
        }
    }

    public function selectCategory($id)
    {
        $this->files = Http::get('https://api.semgu.kz/ebooks/index.php',[
            'type' => $id
        ])->object();
    }

    public function render()
    {
        return view('livewire.lib-files');
    }
}
