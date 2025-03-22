<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $books = Book::get();

        return view('books.search', [
            'books' => $books
        ]);
    }
}
