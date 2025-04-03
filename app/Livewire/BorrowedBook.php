<?php

namespace App\Livewire;

use App\Models\Borrowing;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class BorrowedBook extends Component
{
    use WithPagination;

    public function render()
    {
        $borrowings = Borrowing::where('user_id', Auth::user()->id)
            ->with(['book'])
            ->orderByDesc('due_date')
            ->paginate(10);

        return view('livewire.borrowed-book', [
            'borrowings' => $borrowings
        ]);
    }
}
