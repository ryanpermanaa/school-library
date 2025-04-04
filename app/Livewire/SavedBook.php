<?php

namespace App\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SavedBook extends Component
{
    #[Validate('string')]
    public $search;

    public function resetSearch()
    {
        $this->reset('search');
    }

    public function render()
    {
        $books = Book::with(['borrowings', 'currentBorrowing'])
            ->whereHas('savedByUsers', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->when($this->search, fn($query) => $query->where('title', 'like', "%{$this->search}%"))
            ->get();


        return view('livewire.saved-book', [
            'books' => $books
        ]);
    }
}
