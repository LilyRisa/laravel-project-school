<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class seeder_blog extends Seeder
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
        	DB::table('blog')->insert([
            	'blog_title' => $faker->word,
            	'blog_meta' => $faker->word,
            	'blog_body' => $faker->text($maxNbChars = 1000),
            	'user_id' => 1,
            	'category_child_id' => $faker->numberBetween(1,14),
            	'img_id' => $faker->numberBetween(1,5),
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

        	]);
        }
    }
}
