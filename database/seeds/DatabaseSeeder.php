<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('species')->insert([
            'name' => 'Kates',
        ]);
        DB::table('species')->insert([
            'name' => 'Sunys',
        ]);
        DB::table('species')->insert([
            'name' => 'Begemotai',
        ]);
        DB::table('species')->insert([
            'name' => 'Zuvys',
        ]);
        DB::table('species')->insert([
            'name' => 'Pauksciai',
        ]);

        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            DB::table('managers')->insert([
                'specie_id' => rand(1, 5),
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
            ]);
        }
    }
}
