<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = [
            [
                'name' => 'Giancarlo',
                'password' => 'adminadmin',
            ],
            [
                'name' => 'Giuseppe',
                'password' => 'adminadmin',
            ],
            [
                'name' => 'Amedeo',
                'password' => 'adminadmin',
            ],
            [
                'name' => 'Mario',
                'password' => 'adminadmin',
            ],

        ];


        $admin = [
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => 'adminadmin'
        ];

        $user = new User();
        $user->name = $admin['name'];
        $user->email = $admin['email'];
        $user->password = bcrypt($admin['password']);
        $user->save();

        foreach ($users as $utente) {
            $user = new User();
            $user->name = $utente['name'];
            $user->email = $faker->email();
            $user->password = bcrypt($utente['password']);
            $user->save();
        }
    }
}
