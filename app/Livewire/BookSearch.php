<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class BookSearch extends Component
{
    use WithPagination;

    #[Validate('string|max:100')]
    public $key = '';

    #[Validate('array|max:11')]
    public $selectedCategories = [];
    public $categoriesStr = "";

    #[Validate('string|in:terbaru,terlama,populer,disimpan')]
    public $sortType = '';

    #[Validate('string|in:tersedia,dipinjam')]
    public $statusType = '';

    protected $queryString = [
        'categoriesStr' => [
            'as' => 'category',
        ],
        'sortType' => [
            'as' => 'sort',
        ],
        'statusType' => [
            'as' => 'status',
        ],
    ];

    public function mount()
    {
        $this->key = request()->query('key');

        $categories = request()->query('category');
        $this->selectedCategories = $categories ? explode(',', $categories) : [];

        $sortType = request()->query('sort');
        $this->sortType = $sortType ?? "";

        $statusType = request()->query('status');
        $this->statusType = $statusType ?? "";

        $this->loadBooks();
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

        $this->loadBooks();
    }

    public function resetSearch()
    {
        $this->reset('key');
        $this->loadBooks();
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

        $this->loadBooks();
    }

    public function loadBooks()
    {
        // $this->books = Book::query()
        //     ->with(['likedByUsers', 'savedByUsers', 'category'])
        //     ->when($this->key, function ($query, string $key) {
        //         return $query->where("title", "like", "%{$key}%");
        //     })
        //     ->when($this->selectedCategories, function ($query) {
        //         return $query->whereHas(
        //             "category",
        //             fn($query) => $query->whereIn("name", $this->selectedCategories)
        //         );
        //     })
        //     ->when($this->sortType, function ($query, string $sortType) {
        //         if ($sortType === "terbaru") {
        //             return $query->latest();
        //         } else if ($sortType === "terlama") {
        //             return $query->oldest();
        //         } else if ($sortType === "paling populer") {
        //             return $query->popular();
        //         } else if ($sortType === "terbanyak disimpan") {
        //             return $query->withCount("savedByUsers")->orderBy("saved_by_users_count", "desc");
        //         }
        //     })
        //     ->when($this->statusType, function ($query, $statusType) {
        //         return $query->where("is_available", $statusType === "tersedia");
        //     })
        //     ->paginate(2);
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::pluck('name')->toArray();

        $books = Book::query()
            ->with(['likedByUsers', 'savedByUsers', 'category'])
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
            ->when($this->statusType, fn($query) => $query->where("is_available", $this->statusType === "tersedia"))
            ->paginate(10);

        // dump($books);

        return view('livewire.book-search', [
            'books' => $books,
            'categories' => $categories
        ]);
    }
}
