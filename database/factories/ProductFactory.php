<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->name,
        'picture' =>time().$faker->image(public_path('uploads/products'), $width = 500, $height = 325, $img_type, false),
        'description' => $faker->realText(500),
        'is_active' => $faker->randomElement([true,false]),

    ];
});
