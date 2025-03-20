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
            ['name' => 'Teknologi', 'text_color' => '#0D47A1', 'background_color' => '#E3F2FD'],
            ['name' => 'Sains', 'text_color' => '#388E3C', 'background_color' => '#E8F5E9'],
            ['name' => 'Bisnis', 'text_color' => '#F57C00', 'background_color' => '#FFF3E0'],
            ['name' => 'Kesehatan', 'text_color' => '#D32F2F', 'background_color' => '#FFEBEE'],
            ['name' => 'Pendidikan', 'text_color' => '#512DA8', 'background_color' => '#EDE7F6'],
            ['name' => 'Gaya Hidup', 'text_color' => '#C2185B', 'background_color' => '#FCE4EC'],
            ['name' => 'Hiburan', 'text_color' => '#7B1FA2', 'background_color' => '#F3E5F5'],
            ['name' => 'Sejarah', 'text_color' => '#5D4037', 'background_color' => '#EFEBE9'],
            ['name' => 'Olahraga', 'text_color' => '#0288D1', 'background_color' => '#E1F5FE'],
            ['name' => 'Perjalanan', 'text_color' => '#009688', 'background_color' => '#E0F2F1'],
            ['name' => 'Spiritualitas', 'text_color' => '#FF6F00', 'background_color' => '#FFF8E1'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
