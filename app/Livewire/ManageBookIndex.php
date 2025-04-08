<?php

namespace App\Livewire;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ManageBookIndex extends Component
{
    use WithPagination;

    public $returnSuccess, $alertTitle, $alertDescription;
    public $selectedBook;

    public function markAsReturned(Book $book)
    {
        if (!Auth::user()->is_admin || $book->currentBorrowing === null) {
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

    public function deleteBook()
    {
        if (!Auth::user()->is_admin) return;

        $book = Book::find($this->selectedBook);

        if ($book) {
            try {
                if ($book->cover_path) {
                    $path = str_replace(asset('storage') . '/', '', $book->cover_path);
                    Storage::disk('public')->delete($path);
                }

                $book->delete();

                $this->returnSuccess = true;
                $this->alertTitle = "Berhasil menghapus buku!";
                $this->alertDescription = "Buku telah dihapus dari data.";
            } catch (\Exception $e) {
                Log::error("Failed to delete book #$book->id: " . $e->getMessage());
                $this->returnSuccess = false;
                $this->alertTitle = "Gagal menghapus buku :(";
                $this->alertDescription = "Coba lagi nanti atau hubungi developer.";
                return;
            }
        } else {
            $this->returnSuccess = false;
            $this->alertTitle = "Gagal menghapus buku :(";
            $this->alertDescription = "Coba lagi nanti atau hubungi developer.";
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

        if (Session::has('status')) {
            if (Session::get('status') === "success") {
                $this->returnSuccess = true;
                $this->alertTitle = "Buku berhasil diedit!";
                $this->alertDescription = "Data buku telah berhasil diedit.";
            } else {
                $this->returnSuccess = false;
                $this->alertTitle = "Buku gagal diedit :(";
                $this->alertDescription = "Coba lagi nanti atau hubungi developer.";
            }
        }

        return view('livewire.manage-book-index', [
            'books' => $books
        ]);
    }
}
