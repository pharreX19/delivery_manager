<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use App\Order;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'island'=> $faker->lastName,
        'country'=> 'Maldives',
        'building' => $faker->buildingNumber,
        'road' => $faker->streetName,
        'block_no' => $faker->streetAddress,
        'floor_no' => $faker->randomDigit,
        // 'order_id'=> Order::all()->random()->id
    ];
});
