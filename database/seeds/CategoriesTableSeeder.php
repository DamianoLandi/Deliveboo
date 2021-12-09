<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Vegan', 'color' => '#38c172'],
            ['name' => 'GlutenFree', 'color' => '#ffed4a'],
            ['name' => 'Vegetarian', 'color' => '#146e3a'],
        ];

        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->name = $category['name'];
            $new_category->color = $category['color'];
            $new_category->save();
        }
    }
}
