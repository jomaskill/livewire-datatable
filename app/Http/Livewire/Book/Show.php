<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Livewire\Component;

class Show extends Component
{
    public Book $book;

    public function mount(Book $book)
    {
        $this->book = $book;
    }

    public function render()
    {
        return view('livewire.book.show');
    }
}
