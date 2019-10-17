<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker, $data) {
    return [
        'project_id' => $data['project_id'],
        'estimate_id' => $data['estimate_id'],
        'amount' => $data['amount']
    ];
});
