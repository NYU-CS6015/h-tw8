<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();

        $limit = 30;

        for ($i = 0; $i < $limit; $i++) {
        	DB::table('tasks')->insert([
            'residenceId' => 1,
            'userId' => 1,
            'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'description' => $faker->text($maxNbChars = 200),
            'bounty' => $faker->numberBetween($min = 0, $max = 1000),
            'releaseDate' => $faker->dateTime($max = 'now'),
            'deadline' => $faker->date($format = 'Y-m-d', $max = '2017-01-01'),

        ]);
        }
    }
}
