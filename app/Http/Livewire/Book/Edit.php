<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Livewire\Component;

class Edit extends Component
{
    public Book $book;

    protected $rules = [
        'book.name' => 'required',
        'book.pages' => 'required',
        'book.author' => 'required',
    ];

    public function mount(Book $book)
    {
        $this->book = $book;
    }

    public function render()
    {
        return view('livewire.book.edit');
    }

    public function update()
    {
        $this->validate();

        $this->book->save();

        session()->flash('message', 'Book update successfully');

        return redirect()->route('books.index');
    }
}
