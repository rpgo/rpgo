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
            $worldName = ucfirst(join(" ", $faker->words(3)));

            $world = new \Rpgo\Application\Repository\Eloquent\World([
                'id' => $faker->uuid,
                'name' => $worldName,
                'slug' => \Illuminate\Support\Str::slug($worldName),
                'brand' => substr($worldName, 0, 10),
            ]);

            $member = new \Rpgo\Application\Repository\Eloquent\Member([
                'id' => $faker->uuid,
                'name' => ucfirst($faker->word),
            ]);

            $creator = \Rpgo\Application\Repository\Eloquent\User::orderBy(DB::raw('RAND()'))->first();

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