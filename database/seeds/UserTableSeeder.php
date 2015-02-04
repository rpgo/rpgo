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

        foreach(range(1, 10) as $index)
        {
            $user = \Rpgo\Application\Repository\Eloquent\Model\User::create([
                'id' => $faker->uuid,
                'name' => ucfirst($faker->word),
                'password' => \Hash::make('12345'),
                'email' => $faker->email,
            ]);
        }

    }

}