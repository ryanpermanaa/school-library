<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Auth;

class BookDetailAction extends Component
{
    public $book;
    public $isLiked, $isSaved, $isCurrentUserBorrowing;

    public function mount($book)
    {
        $this->book = $book;
        $this->isLiked = Auth::user()->likedBooks->contains($book->id);
        $this->isSaved = Auth::user()->savedBooks->contains($book->id);

        if ($book->currentBorrowing) {
            $this->isCurrentUserBorrowing = $book->currentBorrowing->user_id == Auth::user()->id;
        }
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

        $this->isCurrentUserBorrowing = $this->book->currentBorrowing->user_id == Auth::user()->id;
    }

    public function render()
    {
        return view('livewire.book-detail-action', $this->book);
    }
}
