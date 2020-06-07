<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
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

$factory->define(Client::class, function (Faker $faker) {
  return [
    'name' => $faker->name,
    'address' => $faker->streetAddress,
    'email' => $faker->email,
    'street' => $faker->streetName,
    'area_id' => $faker->numberBetween(1, 50),
    'city_id' => $faker->numberBetween(1, 10),
    'mobile' => $faker->numberBetween(3001000000, 3008999999),
    'demand' => $faker->numberBetween(1,10),
  ];
            
            
});
