<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'teknologi', 'text_color' => '#0D47A1', 'background_color' => '#E3F2FD'],
            ['name' => 'sains', 'text_color' => '#388E3C', 'background_color' => '#E8F5E9'],
            ['name' => 'bisnis', 'text_color' => '#F57C00', 'background_color' => '#FFF3E0'],
            ['name' => 'kesehatan', 'text_color' => '#D32F2F', 'background_color' => '#FFEBEE'],
            ['name' => 'pendidikan', 'text_color' => '#512DA8', 'background_color' => '#EDE7F6'],
            ['name' => 'gaya hidup', 'text_color' => '#C2185B', 'background_color' => '#FCE4EC'],
            ['name' => 'hiburan', 'text_color' => '#7B1FA2', 'background_color' => '#F3E5F5'],
            ['name' => 'sejarah', 'text_color' => '#5D4037', 'background_color' => '#EFEBE9'],
            ['name' => 'olahraga', 'text_color' => '#0288D1', 'background_color' => '#E1F5FE'],
            ['name' => 'perjalanan', 'text_color' => '#009688', 'background_color' => '#E0F2F1'],
            ['name' => 'spiritualitas', 'text_color' => '#FF6F00', 'background_color' => '#FFF8E1'],
            ['name' => 'fiksi', 'text_color' => '#6A1B9A', 'background_color' => '#F3E5F5'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
