<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use App\Models\Technology;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {

        $categories = Category::all();
        $categoryIds = $categories->pluck('id');

        $technologies = Technology::all();
        $techIds = $technologies->pluck('id');

        for ($i = 0; $i < 10; $i++) {

            $new_Project = new Project();
            $new_Project->title = $faker->name();
            $new_Project->link_project = $faker->url();
            $new_Project->description = $faker->sentence();
            $new_Project->category_id = $faker->optional()->randomElement($categoryIds);

            $new_Project->save();
            $new_Project->technologies()->attach($faker->randomElements($techIds, null));
        }
    }
}
