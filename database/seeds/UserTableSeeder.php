<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 30) as $index)
        {
            $user = \Rpgo\User::create([
                'name' => ucfirst($faker->word),
                'password' => \Hash::make('12345'),
                'email' => $faker->email,
            ]);
        }

    }

}