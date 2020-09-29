<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->sentences,
        'order_id' => Order::all()->random()->id
    ];
});
