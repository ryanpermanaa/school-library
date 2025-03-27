<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        $this->call([CategorySeeder::class, BookSeeder::class]);

        DB::table('book_likes')->insert([
            "user_id" => 1,
            "book_id" => 1,
            "created_at" => now()
        ]);

        DB::table('book_saves')->insert([
            "user_id" => 1,
            "book_id" => 1,
            "created_at" => now()
        ]);
    }
}
