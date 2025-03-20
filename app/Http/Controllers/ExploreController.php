<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $books = Book::query()->get();
        $popular_books = Book::query()->withCount('likedByUsers')
            ->orderBy('liked_by_users_count', 'desc')
            ->limit(4)
            ->get();
        $latest_books = Book::query()->latest()->limit(4)->get();

        return view('books.explore', [
            'books' => $books,
            'popular_books' => $popular_books,
            'latest_books' => $latest_books
        ]);
    }
}
