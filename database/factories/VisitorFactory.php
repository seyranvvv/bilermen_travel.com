<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Visitor;
use Faker\Generator as Faker;

$factory->define(Visitor::class, function (Faker $faker) {
    $date = $faker->dateTimeBetween($startDate = '-15 months', $endDate = 'now');
    $userAgent = App\Models\UserAgent::inRandomOrder()->first();
    return [
        'ip_address_id' => App\Models\IpAddress::inRandomOrder()->first()->id,
        'user_agent_id' => $userAgent->id,
        'hits' => rand(10, 40),
        'suspect_hits' => rand(1, 25),
        'robot' => $userAgent->robot == null ? 0 : 1,
        'api' => rand(0, 1),
        'created_at' => $date,
        'updated_at' => \Carbon\Carbon::parse($date)->addMinutes(rand(5, 300))->toDateTimeString(),
    ];
});
