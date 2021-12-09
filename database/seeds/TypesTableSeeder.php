<?php

use Illuminate\Database\Seeder;
use App\Models\Type;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Italian', 'color' => '#007fff'],
            ['name' => 'Japanese', 'color' => '#FFFF00'],
            ['name' => 'Mexican', 'color' => '#FFA200'],
            ['name' => 'French', 'color' => '#0000FF'],
            ['name' => 'Turkish', 'color' => '#FF0000'],
        ];
        foreach ($types as $type) {
            $newtype = new Type();
            $newtype->name=$type['name'];
            $newtype->color = $type['color'];
             $newtype->save();
            
        }
    }
}
