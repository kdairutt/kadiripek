<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'title' => 'Portfolyo Sitesi',
            'description' => 'Laravel ve Tailwind CSS ile geliştirdiğim kişisel portfolyo sitem.',
            'category' => 'kod',
            'url' => 'https://kadiripek.com',
            'github_url' => 'https://github.com/kdairutt/kadiripek',
            'order' => 1,
        ]);

        Project::create([
            'title' => 'Staj Projesi',
            'description' => 'Staj dönemimde geliştirdiğim yönetim bilişim sistemi projesi.',
            'category' => 'yönetim',
            'order' => 2,
        ]);
    }
}
