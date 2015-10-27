<?php

use Illuminate\Database\Seeder;

class ProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([[
            'provider' => 'github',
        ],
        [
            'provider' => 'twitter',
        ]]);
    }
}
