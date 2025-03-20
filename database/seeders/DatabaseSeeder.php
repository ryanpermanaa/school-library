<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Lorem',
            'email' => 'test@example.com',
            'password' => 'loremipsum'
        ]);

        $this->call([CategorySeeder::class]);

        Book::factory(5)->create();
    }
}
