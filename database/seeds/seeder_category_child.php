<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class seeder_category_child extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        
        foreach (range(1,10) as $index) {
            DB::table('category_child')->insert([
            'name' => $faker->word,
            'keyword' => Str::random(50),
            'category_id' => $faker->numberBetween(1,16),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

        	]);
        }
    }
}
