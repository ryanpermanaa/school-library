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
            ->find(1);

        return view('livewire.manage-book-index', [
            'book' => $this->books
        ]);
    }
}
