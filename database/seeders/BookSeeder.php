<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Lorem Ipsum',
            'author' => 'Lorem',
            'cover_path' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fassets.visme.co%2Ftemplates%2Fbanners%2Fthumbnails%2Fi_Novel-Book-Cover_full.jpg&f=1&nofb=1&ipt=ddcb3864cabf157ba6a60f40089927e161abb5734a8b10667db4721a541e7c9f&ipo=images',
            'likes_count' => 13,
            'favorites_count' => 3,
            'is_available' => true
        ]);

        Category::create([
            'name' => 'Sejarah',
            'text_color' => '#F8DEDE',
            'background_color' => '#931C1C'
        ]);

        DB::table('book_category')->insert([
            'book_id' => 1,
            'category_id' => 1
        ]);
    }
}
