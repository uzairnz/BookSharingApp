<?php

namespace App\Http\Controllers;

use App\Book;
use App\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function show($id)
    {
        return Book::find($id);
    }
    public function store(Request $request)
    {
        return Book::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $books = Books::findOrFail($id);
        $books = $this->update($request->all());
        return books;
    }

    public function delete(Request $request, $id)
    {
        $books = Book::findOrFail($id);
        $books->delete();
    }
    public function view($id)
    {
        return Book::find($id);
    }


}
