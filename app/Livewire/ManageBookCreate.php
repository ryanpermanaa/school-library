<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class ManageBookCreate extends Component
{
    public $title;

    public $author;

    public $description;

    public $category;

    public $image;

    public function render()
    {
        $categories = Category::pluck('name');

        return view('livewire.manage-book-create', [
            'categories' => $categories
        ]);
    }
}
