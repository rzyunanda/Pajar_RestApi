<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Instings;
use Faker\Generator as Faker;

$factory->define(Instings::class, function (Faker $faker) {

    return [
        'judul' => $faker->word,
        'materi' => $faker->word,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
