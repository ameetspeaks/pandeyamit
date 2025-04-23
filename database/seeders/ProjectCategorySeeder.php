<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Web Development',
            'Mobile Development',
            'UI/UX Design',
            'Machine Learning',
            'DevOps',
            'Blockchain',
        ];

        foreach ($categories as $category) {
            ProjectCategory::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => "Projects related to $category",
            ]);
        }
    }
} 