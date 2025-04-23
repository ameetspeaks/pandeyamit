<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ProjectCategory::all();

        foreach ($categories as $category) {
            for ($i = 1; $i <= 3; $i++) {
                $title = "Sample {$category->name} Project {$i}";
                
                Project::create([
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'description' => "This is a sample project in the {$category->name} category. It showcases various features and technologies used in {$category->name}.",
                    'category_id' => $category->id,
                    'status' => $i % 2 == 0 ? 'completed' : 'ongoing',
                    'technologies_used' => ['PHP', 'Laravel', 'MySQL', 'JavaScript', 'Tailwind CSS'],
                    'project_url' => 'https://example.com',
                    'start_date' => now()->subMonths(rand(1, 12)),
                    'end_date' => now()->addMonths(rand(1, 6)),
                ]);
            }
        }
    }
} 