<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Quam sequi id.',
                'author' => 'Mala Maria Susanti',
                'cover_path' => 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/56d96263885635.5acd0047cf3e6.jpg',
                'category_id' => 6,
                'is_available' => 1,
            ],
            [
                'title' => 'Optio enim voluptas.',
                'author' => 'Betania Wastuti M.Pd',
                'cover_path' => 'https://miblart.com/wp-content/uploads/2020/01/crime-and-mystery-cover-scaled-1.jpeg',
                'category_id' => 2,
                'is_available' => 1,
            ],
            [
                'title' => 'Totam sed inventore.',
                'author' => 'Nabila Utami',
                'cover_path' => 'https://global.penguinrandomhouse.com/wp-content/uploads/2017/12/QueenOfHearts.jpg',
                'category_id' => 4,
                'is_available' => 1,
            ],
            [
                'title' => 'Ipsa quasi et.',
                'author' => 'Mahmud Prakasa',
                'cover_path' => 'https://cdn.pastemagazine.com/www/articles/1salemslotbookcover.jpg',
                'category_id' => 9,
                'is_available' => 1,
            ],
            [
                'title' => 'Iste quia aut perferendis repellendus.',
                'author' => 'Mahmud Imam Budiyanto',
                'cover_path' => 'https://i.insider.com/511cffe5eab8ea1355000012?width=948',
                'category_id' => 2,
                'is_available' => 0,
            ],
        ];

        foreach ($books as $index => $book) {
            DB::table('books')->insert([
                'title' => $book['title'],
                'author' => $book['author'],
                'cover_path' => $book['cover_path'],
                'category_id' => $book['category_id'],
                'is_available' => $book['is_available'],
                'created_at' => Carbon::now()->subDays($index * 3),
                'updated_at' => null,
            ]);
        }
    }
}
