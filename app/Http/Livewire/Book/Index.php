<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.book.index', [
            'books' => Book::paginate()
        ]);
    }

    public function delete($id)
    {

        Book::findOrfail($id)->delete();

        session()->flash('message', 'item deleted');

    }
}
