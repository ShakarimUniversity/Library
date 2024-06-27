<?php

namespace App\Livewire;

use App\Models\BookCover;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class BookView extends ModalComponent
{
    public BookCover $bookCover;

    public function render()
    {
        return view('livewire.book-view');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
