<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageBookUpdate extends Component
{
    use WithFileUploads;

    public $title, $author, $description, $category_id, $cover_path;
    public $old_cover_path, $original;
    public $book, $categories;

    public $hasChanged;

    protected function rules()
    {
        return [
            'title' => ['required', 'min:3'],
            'author' => ['required', 'min:3'],
            'description' => ['required', 'min:10', 'max:500'],
            'category_id' => ['required', Rule::in($this->categories->pluck('id')->toArray())],
            'cover_path' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
        ];
    }

    public function submit()
    {
        if (!Auth::user()->is_admin) abort(403);

        $this->hasChanged = $this->title !== $this->original['title']
            || $this->author !== $this->original['author']
            || $this->description !== $this->original['description']
            || $this->category_id !== $this->original['category_id'];

        if ($this->hasChanged) {

            try {
                $validated = $this->validate();

                if ($this->cover_path) {
                    $path = $this->cover_path->store('book-covers', 'public');
                    $validated['cover_path'] = asset("storage/$path");
                } else {
                    unset($validated['cover_path']);
                }

                $this->book->update($validated);
            } catch (\Exception $e) {
                Log::error('Gagal mengedit buku: ' . $e->getMessage());

                return redirect()->route('admin.kelola-buku.index')->with('status', 'error');
            }
        }

        return redirect()->route('admin.kelola-buku.index')->with('status', 'success');
    }

    public function mount(Book $book)
    {
        $this->book = $book;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->description = $book->description;
        $this->category_id = $book->category_id;
        $this->old_cover_path = $book->cover_path;

        $this->original = [
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description,
            'category_id' => $this->category_id
        ];
    }

    public function render()
    {
        $this->categories = Category::get();
        return view('livewire.manage-book-update', [
            'categories' => $this->categories,
            'hasChanged' => $this->hasChanged
        ]);
    }
}
