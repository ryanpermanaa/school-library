<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageBookCreate extends Component
{
    use WithFileUploads;

    public $title, $author, $description, $category_id, $cover_path;

    public $categories;
    public $createSuccess;

    protected function rules()
    {
        return [
            'title' => ['required', 'min:3'],
            'author' => ['required', 'min:3'],
            'description' => ['required', 'min:10', 'max:500'],
            'category_id' => ['required', Rule::in($this->categories->pluck('id')->toArray())],
            'cover_path' => ['image', 'mimes:jpeg,jpg,png', 'max:2048'],
        ];
    }

    public function submit()
    {
        if (!Auth::user()->is_admin) abort(403);

        try {
            $validated = $this->validate();

            $path = $this->cover_path->store('book-covers', 'public');
            $validated['cover_path'] = asset("storage/$path");

            Book::create($validated);

            $this->reset('title', 'author', 'description', 'category_id', 'cover_path');

            $this->createSuccess = true;
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan buku: ' . $e->getMessage());

            $this->createSuccess = false;
        }
    }

    public function resetAlert()
    {
        $this->reset('createSuccess');
    }

    public function render()
    {
        $this->categories = Category::get();

        return view('livewire.manage-book-create', [
            'categories' => $this->categories
        ]);
    }
}
