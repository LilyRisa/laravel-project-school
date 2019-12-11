<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
class seeder_category extends Seeder
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
        
        foreach (range(1,100) as $index) {
            DB::table('category')->insert([
            'name' => $faker->word,
            'keyword' => $faker->text,
            // 'blog_body' => $faker->word,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

        	]);
        }
    
    }
}
