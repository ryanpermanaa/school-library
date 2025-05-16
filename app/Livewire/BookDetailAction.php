<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Borrowing;
use App\Stats\BorrowingStats as StatsBorrowingStats;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BookDetailAction extends Component
{
    public $book;
    public $isLiked, $isSaved, $isCurrentUserBorrowing;
    public $limitReach;
    public $borrowSuccess, $alertTitle, $alertDescription;
    public $initialPreviousUrl;

    public function mount($book)
    {
        $this->book = $book;
        $this->isLiked = Auth::user()->likedBooks->contains($book->id);
        $this->isSaved = Auth::user()->savedBooks->contains($book->id);

        $this->initialPreviousUrl = request()->headers->get('referer') ?? route('home');
        $this->limitReach = Auth::user()->borrowings->count() >= 3;

        if ($book->currentBorrowing) {
            $this->isCurrentUserBorrowing = $book->currentBorrowing->user_id == Auth::user()->id;
        }
    }

    public function resetAlert()
    {
        $this->reset('borrowSuccess');
    }

    public function likeBook()
    {
        if (!Auth::check()) return;

        $user = Auth::user();
        $user->load('likedBooks')->likedBooks()->toggle($this->book->id);
        $user->load('dislikedBooks')->dislikedBooks()->toggle($this->book->id);
    }

    public function saveBook()
    {
        if (!Auth::check()) return;

        $user = Auth::user();
        $user->load('dislikedBooks')->savedBooks()->toggle($this->book->id);
    }

    public function borrowBook()
    {
        if (!Auth::check()) return;

        $user = Auth::user()->load(['borrowings']);

        if ($user->borrowings->count() == 3) {
            $this->limitReach = true;

            $this->borrowSuccess = false;
            $this->alertTitle = "Tidak bisa meminjam buku.";
            $this->alertDescription = "Jumlah pinjaman buku sudah mencapai batas";
            return;
        }

        try {
            Borrowing::create([
                'user_id' => $user->id,
                'book_id' => $this->book->id,
                'borrowed_at' => now(),
                'due_date' => now()->addWeek(),
            ]);

            StatsBorrowingStats::increase(1);
        } catch (\Exception $e) {
            Log::error('Failed to borrow book: ' . $e->getMessage());
            $this->borrowSuccess = false;

            return;
        }

        $this->borrowSuccess = true;
        $this->isCurrentUserBorrowing = $this->book->currentBorrowing->user_id == Auth::user()->id;
    }

    public function render()
    {
        return view('livewire.book-detail-action', [
            'book' => $this->book,
            'borrowSuccess' => $this->borrowSuccess,
            'initialPreviousUrl' => $this->initialPreviousUrl
        ]);
    }
}
