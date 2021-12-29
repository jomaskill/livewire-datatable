<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{

    public function index()
    {
        return view('book.index');
    }

    public function create()
    {
        return view('book.create');
    }

    public function show(Book $book)
    {
        return view('book.show')->with(['book' => $book]);
    }

    public function edit(Book $book)
    {
        return view('book.edit')->with(['book' => $book]);
    }

}
