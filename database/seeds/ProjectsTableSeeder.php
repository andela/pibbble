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

        $limit = 20; //number of records to insert

        for ($i = 0; $i < $limit; $i++) {
            DB::table('projects')->insert([ //,
                'user_id' => $faker->numberBetween(2, 41),
                'projectname' => $faker->sentence(1),
                'description' => $faker->paragraph(1),
                'url' => 'http://res.cloudinary.com/pibbble/image/upload/v1445871429/shot2_tv7htq.png',
                'technologies' => $faker->paragraph(1),
                'views' => $faker->numberBetween(500, 10000),
                'likes' => $faker->numberBetween(0, 500),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
            ]);
        }
    }
}
