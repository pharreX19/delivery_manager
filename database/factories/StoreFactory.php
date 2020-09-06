<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use App\Store;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
        'contact_no' => $faker->phoneNumber,
        'registration_no' => $faker->bankAccountNumber,
        'address_id' => Address::all()->random()->id
    ];
});
