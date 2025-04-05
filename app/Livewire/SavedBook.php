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

    #[Validate('string|in:tersedia,dipinjam')]
    public $statusType = '';

    public function resetSearch()
    {
        $this->reset('search');
    }

    public function setFilter(string $filter, $value)
    {
        $value = strtolower($value);

        if ($filter === "statusType") {
            $this->statusType = $this->statusType != $value ? $value : "";
        } else {
            return;
        }
    }

    public function resetFilter($filter)
    {

        if ($filter === "statusType") {
            $this->reset('statusType');
        } else {
            return;
        }
    }

    public function render()
    {
        $books = Book::with(['borrowings', 'currentBorrowing'])
            ->whereHas('savedByUsers', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->when($this->search, fn($query) => $query->where('title', 'like', "%{$this->search}%"))
            ->when($this->statusType, function ($query) {
                if ($this->statusType === 'dipinjam') {
                    $query->whereHas('currentBorrowing');
                } else {
                    $query->whereDoesntHave('currentBorrowing');
                }
            })
            ->get();


        return view('livewire.saved-book', [
            'books' => $books
        ]);
    }
}
