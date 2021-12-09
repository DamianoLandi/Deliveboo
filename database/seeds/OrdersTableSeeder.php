<?php

use Illuminate\Database\Seeder;


use App\Models\Order;
use Faker\Generator as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $customers = [
            ['name' => 'Alberto', 'surname' => 'Rossi', 'street' => 'Giovanni Pascoli'],
            ['name' => 'Roberto', 'surname' => 'Viola', 'street' => 'Catania'],
            ['name' => 'Carla', 'surname' => 'Azzurri', 'street' => 'Giuseppe Garibaldi'], 
            ['name' => 'Angelo', 'surname' => 'Carta', 'street' => 'Torino'],
            ['name' => 'Francesca', 'surname' => 'Oliva', 'street' => 'Leonardo da Vinci'],
            ['name' => 'Luca', 'surname' => 'Sedia', 'street' => 'Raffaello Sanzio'],
            ['name' => 'John', 'surname' => 'Forchetta', 'street' => 'Michelangelo Buonarroti'],
            ['name' => 'Marta', 'surname' => 'Moneta', 'street' => 'Palmiro Togliatti'],
            ['name' => 'Emanuele','surname' => 'Valle', 'street' => 'Tevere'],
            ['name' => 'Sandro', 'surname' => 'Gallo', 'street' => 'Milano'],
        ];

        foreach($customers as $customer){
            $order = new Order();

            $order->amount = $faker->randomFloat(2, 1, 10000);
            $order->is_payed = rand(0, 1);
            $order->customer_name = $customer['name'];
            $order->customer_lastname = $customer['surname'];
            $order->customer_address = 'Via ' . $customer['street'] . ', ' . rand(1, 99) . ' RM 10012';
            $order->customer_email = $faker->email();

            $order->save();
        }
    }
}
