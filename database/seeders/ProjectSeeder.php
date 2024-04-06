<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 30; $i++) {
            $title = $faker->sentence;
            if (Str::endsWith($title, '.')) {
                $title = substr($title, 0, -1);
            }

            Project::create([
                'title' => $title,
                'description' => $faker->paragraph(3),
                'percorso_immagine' => 'percorso_immagine' . $faker->numberBetween(1, 10) . '.jpg',
                'url' => $faker->url,
                'slug' => Str::slug($faker->sentence(3)),
            ]);
        }
    }
}
