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
        $faker = Faker\Factory::create();

        $limit = 40; //number of records to insert

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([ //,
                'username' => $faker->unique()->userName,
                'password' => 'password',
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'bio' => $faker->paragraph(1),
                'location' => $faker->country,
                'job' => $faker->word(20),
                'provider' => 'github',
                'uid' => $faker->unique()->ean8,
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now'),
            ]);
        }
    }
}
