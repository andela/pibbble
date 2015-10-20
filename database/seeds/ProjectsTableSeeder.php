<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
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
            DB::table('projects')->insert([ //,
                'user_id' => $faker->numberBetween(2, 41),
                'projectname' => $faker->sentence(5),
                'description' => $faker->paragraph(1),
                'url' => $faker->url,
                'technologies' => $faker->paragraph(1),
                'views' => $faker->numberBetween(0, 1000000),
                'likes' => $faker->numberBetween(0, 1000000),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
            ]);
        }
    }
}
