<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Livewire\Component;

class Create extends Component
{

    public Book $book;

    protected $rules = [
        'book.name' => 'required',
        'book.pages' => 'required',
        'book.author' => 'required',
    ];

    public function mount()
    {
        $this->book = new Book;
    }

    public function save()
    {
        $this->validate();

        $this->book->save();

        session()->flash('message', 'Book created successfully');

        return redirect()->route('books.index');
    }

    public function render()
    {
        return view('livewire.book.create');
    }
}
