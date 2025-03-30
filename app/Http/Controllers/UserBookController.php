<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class UserBookController extends Controller
{
    public function explore()
    {
        $popular_books = Book::with(['likedByUsers', 'savedByUsers', 'category'])->popular()->limit(4)
            ->get();
        $latest_books = Book::with(['likedByUsers', 'savedByUsers', 'category'])->latest()->limit(4)->get();

        return view('books.explore', [
            'popular_books' => $popular_books,
            'latest_books' => $latest_books
        ]);
    }

    public function search()
    {
        return view('books.search');
    }

    public function view($id)
    {
        $book = Book::find($id);
        return view('books.detail', [
            'book' => $book
        ]);
    }
}
