<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class WorldTableSeeder extends Seeder {

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
            $world = new \Rpgo\World([
                'name' => ucfirst($faker->word),
                'slug' => $faker->word,
                'brand' => ucfirst($faker->word),
            ]);

            $member = new \Rpgo\Member([
                'name' => ucfirst($faker->word),
            ]);

            $creator = \Rpgo\User::orderBy(DB::raw('RAND()'))->first();

            if($creator)
            {
                $world->creator()->associate($creator);
                $world->save();
                $member->user()->associate($creator);
                $member->world()->associate($world);
                $member->save();
            }
        }

    }

}