<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use App\Order;
use App\Staff;
use App\Status;
use App\Address;
use App\Customer;
use App\Store;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'item_id'=>Item::all()->random()->id,
        'quantity'=>random_int(1,100),
        'customer_id'=>Customer::all()->random()->id,
        'staff_id'=>Staff::all()->random()->id,
        'status_id'=>Status::all()->random()->id,
        'store_id' => Store::all()->random()->id
    ];
});
