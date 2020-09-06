<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Staff;
use App\Store;
use Faker\Generator as Faker;

$factory->define(Staff::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'contact_no' => $faker->e164PhoneNumber,
        'joined_at' => $faker->dateTime(),
        'country'=> $faker->country,
        'store_id'=> Store::all()->random()->id
    ];
});
