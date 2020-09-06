<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use App\Store;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName,
        'code' => $faker->countryCode,
        'description' => $faker->sentence,
        'store_id' => Store::all()->random()->id
    ];
});
