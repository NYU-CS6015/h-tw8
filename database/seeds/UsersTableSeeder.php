<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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

        $limit = 20;

        for ($i = 0; $i < $limit; $i++) {
        	DB::table('users')->insert([
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'gender' => "Female",
            'email' => $faker->unique()->email,
            'birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'password' => $faker->password,
        ]);
        }
        
    }
}
