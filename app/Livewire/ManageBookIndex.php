<?php

namespace App\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class ManageBookIndex extends Component
{
    use WithPagination;

    public $returnSuccess;

    public function markAsReturned(Book $book)
    {
        if (! Auth::check() || $book->currentBorrowing === null) {
            $this->returnSuccess = false;
            return;
        }

        try {
            $book->currentBorrowing?->update([
                'returned_at' => now(),
                'status' => 'returned'
            ]);

            $book->update(['is_available' => true]);

            $this->returnSuccess = true;
        } catch (\Throwable $e) {
            Log::error("Failed to return book #$book->id: " . $e->getMessage());
            $this->returnSuccess = false;

            return;
        }


        $this->resetPage();
    }

    public function resetAlert()
    {
        $this->reset('returnSuccess');
    }

    public function render()
    {
        $books = Book::with([
            'borrowings' => fn($q) => $q->orderByDesc('borrowed_at'),
            'currentBorrowing.user',
            'likedByUsers',
            'dislikedByUsers',
            'category',
        ])->paginate(10);

        return view('livewire.manage-book-index', [
            'books' => $books
        ]);
    }
}
