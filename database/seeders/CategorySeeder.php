<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = ['Frontend', 'Backend', 'Design', 'FullStack'];

        foreach ($categories as  $category_name) {
            $new_category = new Category();
            $new_category->name = $category_name;
            $new_category->slug = Str::slug($category_name);

            $new_category->save();
        }
    }
}
