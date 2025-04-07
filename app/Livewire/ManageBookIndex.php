<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Borrowing;
use Livewire\Component;

class ManageBookIndex extends Component
{
    public $books;

    public function render()
    {
        $this->books = Book::with(['borrowings', 'currentBorrowing', 'likedByUsers', 'dislikedByUsers', 'category'])
            ->get();

        return view('livewire.manage-book-index', [
            'books' => $this->books
        ]);
    }
}
