<?php

use Tyondo\Aggregator\Models\Post;
use Tyondo\Aggregator\Models\User;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/*
|--------------------------------------------------------------------------
| Post Model Factory
|--------------------------------------------------------------------------
|
| Create the other Posts.
|
*/
$factory->define(Post::class, function (Faker\Generator $faker) {
    $title = $faker->sentence(6);
    $slug = str_slug($title);
    $body = $faker->paragraph(15);
    $summary = str_limit($body,40,'...');
    return [
        'user_id' => 1,
        'category_id' => 1,
        'photo_id' => 2,
        'status' => 1,
        'title' => $title,
        'slug' => $slug,
        'body' => $body,
        'summary' => $summary,
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
    ];
});


