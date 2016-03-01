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
        'username' => $faker->userName,
        'password' => bcrypt(str_random(10)),
        'name'     => null,
        'email'    => $faker->email,
        'bio'      => null,
        'location' => null,
        'avatar'   => null,
        'provider' => null,
        'uid'      => null,
        'remember_token' => str_random(10),
    ];
});

$factory->define(Pibbble\Project::class, function (Faker\Generator $faker) {
    return [
        'projectname'   => $faker->name,
        'description'   => $faker->sentence,
        'technologies'  => 'Javascript',
        'project_url'   => $faker->url,
        'image_url'     => $faker->url,
        'user_id'       => 1,
    ];
});
