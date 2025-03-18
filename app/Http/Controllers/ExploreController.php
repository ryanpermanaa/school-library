<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $books = Book::get();
        $recommended_books = Book::limit(4)->get();

        return view('user.explore', [
            'books' => $books,
            'recommended_books' => $recommended_books
        ]);
    }
}
