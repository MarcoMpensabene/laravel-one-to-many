<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 20; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence(3);
            $newProject->description = $faker->paragraph(3);
            $newProject->author = $faker->name;
            $newProject->image_url = $faker->imageUrl(300, 300, 'technology');
            $newProject->stack = $faker->randomElement(['PHP', 'JavaScript', 'Python', 'Java', 'Ruby', 'C#']);
            $newProject->save();
        }
    }
}
