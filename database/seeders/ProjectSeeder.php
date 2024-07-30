<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
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
        $types = Type::all()->pluck('id');
        for ($i = 0; $i < 20; $i++) {
            $newProject = new Project();
            $newProject->type_id = $faker->randomElement($types); // ! ci prende un id random nell'array types
            $newProject->title = $faker->sentence(3);
            $newProject->description = $faker->paragraph(3);
            $newProject->author = $faker->name;
            $newProject->image_url = $faker->imageUrl(300, 300, 'technology');
            $newProject->stack = $faker->randomElement(['PHP', 'JavaScript', 'Python', 'Java', 'Ruby', 'C#']);
            $newProject->save();
        }
    }
}
