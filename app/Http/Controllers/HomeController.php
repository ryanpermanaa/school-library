<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::with(['likedByUsers'])->popular()->limit(8)->get();
        $latest_books = Book::latest()->limit(4)->select('id', 'title', 'cover_path')->get();

        return view('welcome', [
            'books' => $books,
            'latest_books' => $latest_books
        ]);
    }
}
