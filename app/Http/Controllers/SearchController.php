<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'key' => 'nullable|string|min:1|max:255'
        ]);

        $key = $validated['key'] ?? null;

        $books = Book::when(
            $key,
            function ($query) use ($key) {
                $query->where('title', 'like', "%$key%");
            }
        )->get();

        return view('books.search', [
            'books' => $books
        ]);
    }
}
