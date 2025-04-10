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
    }
}
