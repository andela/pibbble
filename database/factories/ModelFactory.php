<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Pibbble\User::class, function (Faker\Generator $faker) {
    return [
        'provider' => $faker->domainName,
        'provider_id' => $faker->uuid,
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'bio' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'location' => $faker->address,
        'avatar' => $faker->url,
        'remember_token' => str_random(10)
    ];
});
