<?php

namespace App\Livewire;

use App\Models\Borrowing;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookDetailAction extends Component
{
    public $book;
    public $isLiked, $isSaved, $isCurrentUserBorrowing;

    public function mount($book)
    {
        $this->book = $book;
        $this->isLiked = Auth::user()->likedBooks->contains($book->id);
        $this->isSaved = Auth::user()->savedBooks->contains($book->id);
        $this->isCurrentUserBorrowing = Auth::user()->borrowings->contains($book->id);
    }

    public function likeBook()
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

    public function borrowBook()
    {
        if (!Auth::check()) return;

        $user = Auth::user()->load(['borrowings']);

        Borrowing::create([
            'user_id' => $user->id,
            'book_id' => $this->book->id,
            'borrowed_at' => now(),
            'due_date' => now()->addWeek(),
        ]);

        $this->book->update([
            'is_available' => false
        ]);
    }

    public function render()
    {
        return view('livewire.book-detail-action', $this->book);
    }
}
