<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use App\Customer;
use App\Order;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'contact_no'=>$faker->phoneNumber,
        'address_id'=> Address::all()->random()->id,
    ];
});
