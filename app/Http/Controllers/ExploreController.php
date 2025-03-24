<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $popular_books = Book::query()->popular()->limit(4)
            ->get();
        $latest_books = Book::query()->latest()->limit(4)->get();

        return view('books.explore', [
            'popular_books' => $popular_books,
            'latest_books' => $latest_books
        ]);
    }
}
