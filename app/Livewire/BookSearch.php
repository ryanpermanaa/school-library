<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BookSearch extends Component
{
    #[Validate('string')]
    public $key = '';

    public $selectedCategories = [];

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

    public function setCategory($category)
    {
        $category = strtolower($category);

        if (in_array($category, $this->selectedCategories)) {
            $this->selectedCategories = array_filter($this->selectedCategories, fn($c) => $c !== $category);
        } else {
            $this->selectedCategories[] = $category;
        }

        $this->loadBooks();
    }

    public function resetCategory()
    {
        $this->reset('selectedCategories');
        $this->loadBooks();
    }

    public function loadBooks()
    {
        $this->books = Book::query()
            ->when($this->key, function ($query, string $key) {
                return $query->where("title", "like", "%{$key}%");
            })
            ->when($this->selectedCategories, function ($query) {
                return $query->whereHas(
                    "category",
                    fn($query) => $query->whereIn("name", $this->selectedCategories)
                );
            })
            ->get();
    }

    public function render()
    {
        $books = Book::get();
        $categories = Category::pluck('name')->toArray();

        return view('livewire.book-search', [
            'books' => $books,
            'categories' => $categories
        ]);
    }
}
