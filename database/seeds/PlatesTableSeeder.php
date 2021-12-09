<?php

use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // deliveboo
        $plates = [
            [
                'name' => 'Lasagna',
                'description' => 'Piatto simbolo italiano, strati di pasta verde all\'uovo, conditi con il classico ragù della tradizione, besciamella e formaggio grattugiato.',
                'price' => 11.00,
                'is_available' => true,
                'serving' => 'PRI'
            ],
            [
                'name' => 'Tagliata di Manzo',
                'image' => 'https://images.unsplash.com/photo-1529692236671-f1f6cf9683ba?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1470&q=80',
                'description' => 'La tagliata di manzo con rucola e pomodorini è un gustoso secondo piatto di carne realizzato con entrecote di manzo',
                'price' => 16.00,
                'is_available' => true,
                'serving' => 'SEC',
            ],
            [
                'name' => 'Mozzarella in carrozza',
                'image' => 'https://www.giallozafferano.it/images/193-19389/Mozzarella-in-carrozza_360x300.jpg',
                'description' => 'La mozzarella in carrozza è una ricetta della tradizione napoletana, composta da fette di pane in cassetta dal ripieno di filante mozzarella.',
                'price' => 6.00,
                'is_available' => true,
                'serving' => 'ANT',
            ],
            [
                'name' => 'Crocchette di patate',
                'image' => 'https://www.giallozafferano.it/images/166-16678/Crocchette-di-patate_360x300.jpg',
                'description' => 'Croccanti polpette di patate che spariscono in un lampo con la loro panatura dorata e il ripieno morbido',
                'price' => 6.00,
                'is_available' => true,
                'serving' => 'ANT',
            ],
            [
                'name' => 'Pollo al limone',
                'image' => 'https://www.giallozafferano.it/images/235-23580/Pollo-al-limone_360x300.jpg',
                'description' => 'Il pollo al limone si compone di tenere striscioline di carne avvolte da una salsina densa e cremosa dal profumo agrumato.',
                'price' => 13.00,
                'is_available' => true,
                'serving' => 'SEC',
            ],
            [
                'name' => 'Filetto al pepe verde',
                'image' => 'https://www.giallozafferano.it/images/184-18454/Filetto-al-pepe-verde_360x300.jpg',
                'description' => 'Il filetto al pepe verde è un classico secondo di carne dal gusto avvolgente grazie alla cremosa salsa a base di panna e senape con cui viene servito.',
                'price' => 16.00,
                'is_available' => true,
                'serving' => 'SEC',
            ],
            [
                'name' => 'Saltimbocca alla romana',
                'image' => 'https://www.giallozafferano.it/images/204-20401/Saltimbocca-alla-Romana_360x300.jpg',
                'description' => 'Fette sottili di vitello, tagliate in dimensioni ridotte, guarnite con una fettina di prosciutto crudo, una foglia di salvia e rosolate nel burro.',
                'price' => 13.00,
                'is_available' => true,
                'serving' => 'SEC',
            ],
            [
                'name' => 'Tiramisù',
                'image' => 'https://www.giallozafferano.it/images/237-23742/Tiramisu_360x300.jpg',
                'description' => 'Il tiramisù classico è il dessert italiano per eccellenza, uno dei più golosi e conosciuti al mondo. Crema al mascarpone e savoiardi al caffè!',
                'price' => 10.00,
                'is_available' => true,
                'serving' => 'DOL',
            ],
            [
                'name' => 'New York Cheesecake',
                'image' => 'https://www.giallozafferano.it/images/175-17503/New-York-Cheesecake_360x300.jpg',
                'description' => 'La New York cheesecake è un tipico dolce americano preparato con una base di biscotti, una crema al formaggio cremoso e una cascata di frutti di bosco',
                'price' => 10.00,
                'is_available' => true,
                'serving' => 'DOL',
            ],
            [
                'name' => 'Tortino al cioccolato con cuore fondente',
                'image' => 'https://www.giallozafferano.it/images/235-23566/Tortino-di-cioccolato-con-cuore-fondente_360x300.jpg',
                'description' => 'Il tortino di cioccolato con cuore fondente è un dessert che nasconde un cuore morbido, caldo e avvolgente',
                'price' => 10.00,
                'is_available' => true,
                'serving' => 'DOL',
            ],
        ];

        $restaurant_ids = Restaurant::select('id')->pluck('id')->toArray();
        foreach ($plates as $plate) {
            $new_plate = new Plate();
            $new_plate->name = $plate['name'];
            // $new_plate->image = $plate['image'];
            $new_plate->description = $plate['description'];
            $new_plate->price = $plate['price'];
            $new_plate->is_available = $plate['is_available'];
            $new_plate->serving = $plate['serving'];
            $new_plate->restaurant_id = Arr::random($restaurant_ids);
            $new_plate->save();
        }
    }
}
