<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class BorrowedBook extends Component
{
    public $book;
    public $isLiked, $isDisliked, $isSaved;

    public function likeBook()
    {
        if (!Auth::check()) return;

        $user = Auth::user()->load(['likedBooks']);
        $user->likedBooks()->toggle($this->book->id);
    }

    public function dislikeBook()
    {
        if (!Auth::check()) return;

        $user = Auth::user()->load(['likedBooks']);
        $user->likedBooks()->toggle($this->book->id);
    }

    public function saveBook()
    {
        if (!Auth::check()) return;

        $user = Auth::user()->load(['savedBooks']);
        $user->savedBooks()->toggle($this->book->id);
    }

    public function render()
    {
        $this->book = $books = Book::query()
            ->with(['likedByUsers', 'savedByUsers', 'category', 'borrowings'])
            ->first();

        return view('livewire.borrowed-book', $this->book);
    }
}
