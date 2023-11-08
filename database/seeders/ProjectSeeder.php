<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->realText(50);
            $project->slug = Str::slug($project->title, '-');
            $project->description = $faker->realText();
            $project->image = 'placeholders/' . $faker->image('public/storage/placeholders', 640, 480, fullPath: false);
            $project->publication_date = $faker->dateTimeBetween('-5 months', '+1 month');
            $project->project_type = $faker->company();
            $project->save();
        }
    }
}
