<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use App\AddressCustomer;
use App\Customer;
use App\Order;
use Faker\Generator as Faker;

$factory->define(AddressCustomer::class, function (Faker $faker) {
    return [
        'address_id'=> Address::all()->random()->id,
        'customer_id'=> Customer::all()->random()->id,
        // 'order_id'=> Order::all()->random()->id
    ];
});
