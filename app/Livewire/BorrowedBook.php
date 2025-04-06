<?php

namespace App\Livewire;

use App\Models\Borrowing;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class BorrowedBook extends Component
{
    use WithPagination;

    public $returnSuccess;

    public function returnBook(Borrowing $borrowment)
    {
        if (!Auth::check()) return;

        $borrowment->update([
            'returned_at' => now(),
            'status' => 'returned'
        ]);

        $borrowment->book->update([
            'is_available' => true
        ]);

        $this->resetPage();
    }

    public function resetAlert()
    {
        $this->reset('returnSuccess');
    }

    public function render()
    {
        $borrowings = Borrowing::where('user_id', Auth::user()->id)
            ->where('returned_at', null)
            ->with(['book'])
            ->orderBy('due_date')
            ->paginate(8);

        return view('livewire.borrowed-book', [
            'borrowings' => $borrowings,
            'returnSuccess' => $this->returnSuccess
        ]);
    }
}
