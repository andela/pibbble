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
                'provider' => 'github',
                'provider_id' => $faker->unique()->ean8,
                'name' => $faker->name,
                'username' => $faker->unique()->userName,
                'email' => $faker->unique()->email,
                'password' => 'password',
                'bio' => $faker->paragraph(1),
                'location' => $faker->country,
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now'),
            ]);
        }
    }
}
