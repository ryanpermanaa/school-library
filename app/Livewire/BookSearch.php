<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BookSearch extends Component
{
    #[Validate('string|max:100')]
    public $key = '';

    #[Validate('array|max:11')]
    public $selectedCategories = [];

    #[Validate('string|in:terbaru,terlama,populer,disimpan')]
    public $sortType = '';

    #[Validate('string|in:tersedia,dipinjam')]
    public $statusType = '';

    public $books = [];

    public function mount()
    {
        $this->key = request()->query('key');

        $categories = request()->query('categories');
        $this->selectedCategories = $categories ? explode(',', $categories) : [];

        $this->loadBooks();
    }

    public function resetSearch()
    {
        $this->reset('key');
        $this->loadBooks();
    }

    public function setFilter(string $filter, $value)
    {
        $value = strtolower($value);

        if ($filter === "category") {
            if (in_array($value, $this->selectedCategories)) {
                $this->selectedCategories = array_filter($this->selectedCategories, fn($c) => $c !== $value);
            } else {
                $this->selectedCategories[] = $value;
            }
        } else if ($filter === "sortType") {
            $this->sortType = $this->sortType != $value ? $value : "";
        } else if ($filter === "statusType") {
            $this->statusType = $this->statusType != $value ? $value : "";
        } else {
            return;
        }

        $this->loadBooks();
    }

    public function resetFilter($filter)
    {
        if ($filter === "category") {
            $this->reset('selectedCategories');
        } else if ($filter === "sortType") {
            $this->reset('sortType');
        } else if ($filter === "statusType") {
            $this->reset('statusType');
        }

        $this->loadBooks();
    }

    public function loadBooks()
    {
        $this->books = Book::query()
            ->with(['likedByUsers', 'savedByUsers', 'category'])
            ->when($this->key, function ($query, string $key) {
                return $query->where("title", "like", "%{$key}%");
            })
            ->when($this->selectedCategories, function ($query) {
                return $query->whereHas(
                    "category",
                    fn($query) => $query->whereIn("name", $this->selectedCategories)
                );
            })
            ->when($this->sortType, function ($query, string $sortType) {
                if ($sortType === "terbaru") {
                    return $query->latest();
                } else if ($sortType === "terlama") {
                    return $query->oldest();
                } else if ($sortType === "paling populer") {
                    return $query->popular();
                } else if ($sortType === "terbanyak disimpan") {
                    return $query->withCount("savedByUsers")->orderBy("saved_by_users_count", "desc");
                }
            })
            ->when($this->statusType, function ($query, $statusType) {
                return $query->where("is_available", $statusType === "tersedia");
            })
            ->get();
    }

    public function render()
    {
        $categories = Category::pluck('name')->toArray();

        return view('livewire.book-search', [
            'books' => $this->books,
            'categories' => $categories
        ]);
    }
}
