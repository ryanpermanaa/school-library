<?php

namespace App\Livewire;

use App\Models\Borrowing;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class BorrowedBook extends Component
{
    use WithPagination;

    public $isLiked, $isDisliked, $returnSuccess, $alertTitle, $alertDescription;
    public $selectedBook;

    public function returnBook(Borrowing $borrowment)
    {
        if (!Auth::check()) return;

        try {
            $borrowment->update([
                'returned_at' => now(),
                'status' => 'returned'
            ]);

            $borrowment->book->update([
                'is_available' => true
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to return book: ' . $e->getMessage());
            $this->returnSuccess = false;

            return;
        }

        $this->returnSuccess = true;

        $this->resetPage();
    }

    public function likeBook()
    {
        if (!Auth::check()) return;
        $user = Auth::user()->load(['likedBooks']);

        try {
            $user->likedBooks()->syncWithoutDetaching($this->selectedBook);
            $user->dislikedBooks()->detach($this->selectedBook);
        } catch (\Throwable $e) {
            Log::error('Failed to like book: ' . $e->getMessage());
            $this->alertTitle = "Gagal Menyukai Buku :(";
        }
    }

    public function dislikeBook()
    {
        if (!Auth::check()) return;
        $user = Auth::user()->load(['dislikedBooks']);

        try {
            $user->dislikedBooks()->syncWithoutDetaching($this->selectedBook);
            $user->likedBooks()->detach($this->selectedBook);
        } catch (\Throwable $e) {
            Log::error('Failed to dislike book: ' . $e->getMessage());
            $this->alertTitle = "Gagal Menyukai Buku :(";
        }
    }

    public function resetAlert()
    {
        $this->reset('returnSuccess');
    }

    public function render()
    {
        $user = Auth::user();
        $this->isLiked = $user->load('likedBooks')->likedBooks->contains($this->selectedBook);
        $this->isDisliked = $user->load('dislikedBooks')->dislikedBooks->contains($this->selectedBook);

        $borrowings = Borrowing::where('user_id', Auth::user()->id)
            ->where('returned_at', null)
            ->with(['book'])
            ->orderBy('due_date')
            ->paginate(8);

        return view('livewire.borrowed-book', [
            'borrowings' => $borrowings,
            'returnSuccess' => $this->returnSuccess,
            'selectedBook' => $this->selectedBook
        ]);
    }
}
