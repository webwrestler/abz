<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'chief_id' => rand(2,4),
        'first_name' => $faker->firstName($gender = 'male'|'female'),
        'middle_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->freeEmail,
        'password' => $faker->password, // secret
        'images' => 'images/pics' . rand(1,13) . '.jpg',
        'position' => 'Junior',
        'wage' => rand(200,500),
        'remember_token' => str_random(10),
    ];
});
