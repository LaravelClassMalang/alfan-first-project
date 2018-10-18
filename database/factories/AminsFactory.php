<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'display_admin' => $faker->name,
        'admin_name' => $faker->unique()->safeEmail,
        'admin_email' => $faker->unique()->safeEmail,
        'admin_password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
