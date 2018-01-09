<?php

//use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Spatie\Permission\Models\Permission::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'display_name' => $faker->word
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Spatie\Permission\Models\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'display_name' => $faker->word
    ];
});


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'slug' => $faker->word,
        'post_type_id' => 1
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\CategoryTranslation::class, function (Faker\Generator $faker) {
    return [
        'category_id' => create('App\Models\Category')->id,
        'locale' => 'en',
        'title' => $faker->sentence
    ];
});


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\PostType::class, function (Faker\Generator $faker) {
    return [
        'slug' => $faker->word,
        'name' => $faker->sentence
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        'slug' => $faker->word,
        'post_type_id' => 1,
        'publish_date' => \Carbon\Carbon::now()->format('Y-m-d'),
        'created_by_id' => 1,
        'created_by' => 'Pasha Mahardika',
        'status' => 'publish'
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\PostTranslation::class, function (Faker\Generator $faker) {
    return [
        'post_id' => create('App\Models\Post')->id,
        'locale' => 'en',
        'title' => $faker->sentence,
        'excerpt' => $faker->sentence(10),
        'content' => $faker->sentence(20),
        'page_title' => $faker->sentence,
        'meta_description' => $faker->sentence(5)
    ];
});
