<?php

use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\User;
use Illuminate\Support\Arr;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resturants = [
            [
                'name' => "Silver Spurs",
                'logo' => " https://images.unsplash.com/photo-1527025047-354c31c26312?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cmVzdGF1cmFudCUyMGxvZ298ZW58MHx8MHx8&auto=format&fit=crop&w=400&q=60",
                'address' => "Corso Laguardia,30 RM 10012",
                'vat_number' => '09234567891',
                'phone' => "0688016055",
                'hours' => "Giornaliero: 6am-11pm",
                'user_id' => 1,
            ],
            [
                'name' => "Bakeri",
                'logo' => " https://images.unsplash.com/photo-1460134583608-5f5d1dd1d61c?ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cmVzdGF1cmFudCUyMGxvZ298ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=60",
                'address' => " Via Roma,150, RM 10012",
                'vat_number' => '09234567671',
                'phone' => "0689016055",
                'hours' => "Giornaliero: 8am-7pm",
                'user_id' => 2,

            ],
            [
                'name' => "Pizzeria da Desy",
                'logo' => " https://images.unsplash.com/photo-1563002536-440db6fcc743?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8cmVzdGF1cmFudCUyMGxvZ298ZW58MHx8MHx8&auto=format&fit=crop&w=400&q=60",
                'address' => " Via Milano,15 RM 10012",
                'vat_number' => '09238567671',
                'phone' => "0688987055",
                'hours' => "Giornaliero: 11am-12:30am",
                'user_id' => 3,

            ],
            [
                'name' => "Pizzeria Civico 38",
                'logo' => " https://images.unsplash.com/photo-1622215216302-2169bd5f4e5f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8cmVzdGF1cmFudCUyMGxvZ298ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=60",
                'address' => " Via Venezia,38,RM 10012",
                'vat_number' => '09238569811',
                'phone' => "0688987099",
                'hours' => "Lun-Gio: 10am-10pm Ven: 10am-12am Sab: 12pm-12am Dom: 12pm-10pm",
                'user_id' => 4,

            ],
            [
                'name' => "Porto Fluviale Ristorante Pizzeria",
                'logo' => " https://images.unsplash.com/photo-1572037604517-4651d6444ffc?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjB8fHJlc3RhdXJhbnQlMjBsb2dvfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=60",
                'address' => " Via del Porto Fluviale, 22, RM 00154",
                'vat_number' => '11389961001',
                'phone' => "06 574 3199",
                'hours' => "Lun-Dom: 10:30AM–2AM",
                'user_id' => 5,
            ],


        ];



        foreach ($resturants as $resturant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $resturant['name'];
            $newRestaurant->logo = $resturant['logo'];
            $newRestaurant->address = $resturant['address'];
            $newRestaurant->vat_number = $resturant['vat_number'];
            $newRestaurant->phone = $resturant['phone'];
            $newRestaurant->hours = $resturant['hours'];
            $newRestaurant->user_id = $resturant['user_id'];
            $newRestaurant->save();
        };
    }
}
