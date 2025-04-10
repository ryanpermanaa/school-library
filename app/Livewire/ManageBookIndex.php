<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ManageBookIndex extends Component
{
    use WithPagination;

    #[Validate('string|max:100')]
    public $key = '';

    #[Validate('array|max:11')]
    public $selectedCategories = [];
    public $categoriesStr = "";

    #[Validate('string|in:terbaru,terlama,populer,disimpan')]
    public $sortType = '';

    #[Validate('string|in:tersedia,dipinjam,terlambat')]
    public $statusType = '';

    public $returnSuccess, $alertTitle, $alertDescription;
    public $selectedBook;

    public function mount()
    {
        $this->key = request()->query('key') ?? "";

        $categories = request()->query('category');
        $this->selectedCategories = $categories ? explode(',', $categories) : [];

        $sortType = request()->query('sort');
        $this->sortType = $sortType ?? "";

        $statusType = request()->query('status');
        $this->statusType = $statusType ?? "";

        $this->resetPage();
    }

    public function setFilter(string $filter, $value)
    {
        $value = strtolower($value);

        if ($filter === "category") {
            if (in_array($value, $this->selectedCategories)) {
                $this->selectedCategories = array_values(array_diff($this->selectedCategories, [$value]));
            } else {
                $this->selectedCategories[] = $value;
            }

            $this->categoriesStr = implode(',', $this->selectedCategories);;
        } else if ($filter === "sortType") {
            $this->sortType = $this->sortType != $value ? $value : "";
        } else if ($filter === "statusType") {
            $this->statusType = $this->statusType != $value ? $value : "";
        } else {
            return;
        }

        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->reset('key');
        $this->resetPage();
    }

    public function resetFilter($filter)
    {
        if ($filter === "category") {
            $this->reset('selectedCategories');
            $this->reset('categoriesStr');
        } else if ($filter === "sortType") {
            $this->reset('sortType');
        } else if ($filter === "statusType") {
            $this->reset('statusType');
        }

        $this->resetPage();
    }

    public function markAsReturned(Book $book)
    {
        if (!Auth::user()->is_admin || $book->currentBorrowing === null) {
            $this->returnSuccess = false;
            return;
        }

        try {
            $book->currentBorrowing?->update([
                'returned_at' => now(),
            ]);

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
        $categories = Category::pluck('name')->toArray();

        $books = Book::query()
            ->with(['likedByUsers', 'savedByUsers', 'category', 'borrowings', 'currentBorrowing.user'])
            ->when($this->key, fn($query) => $query->where("title", "like", "%{$this->key}%"))
            ->when($this->selectedCategories, fn($query) => $query->whereHas(
                "category",
                fn($q) => $q->whereIn("name", $this->selectedCategories)
            ))
            ->when($this->sortType, function ($query) {
                return match ($this->sortType) {
                    "terbaru" => $query->latest(),
                    "terlama" => $query->oldest(),
                    "paling populer" => $query->popular(),
                    "terbanyak disimpan" => $query->withCount("savedByUsers")->orderBy("saved_by_users_count", "desc"),
                    default => $query
                };
            })
            ->when($this->statusType, function ($query) {
                if ($this->statusType === 'tersedia') {
                    $query->whereDoesntHave('currentBorrowing');
                } elseif ($this->statusType === 'dipinjam') {
                    $query->whereHas('currentBorrowing');
                } elseif ($this->statusType === 'terlambat') {
                    $query->overdue();
                }
            })
            ->paginate(10);

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
            'books' => $books,
            'categories' => $categories
        ]);
    }
}
