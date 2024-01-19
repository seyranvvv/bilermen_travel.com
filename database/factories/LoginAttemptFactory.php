<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LoginAttempt;
use Faker\Generator as Faker;

$factory->define(LoginAttempt::class, function (Faker $faker) {
    return [
        'ip_address_id' => App\Models\IpAddress::inRandomOrder()->first()->id,
        'username' => $faker->userName,
        'status' => rand(0, 1),
        'created_at' => $faker->dateTimeBetween($startDate = '-15 months', $endDate = 'now'),
    ];
});
