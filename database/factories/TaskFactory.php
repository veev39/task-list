<?php

/* @var $factory Factory */

use App\Models\Enums\TaskStatusTypes;
use App\Models\Task;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Task::class, function (Faker $faker) {
    return [
        Task::TITLE => $faker->word,
        Task::DESCRIPTION => $faker->text(200),
        Task::STATUS => $faker->randomElement([TaskStatusTypes::CLOSED, TaskStatusTypes::ACTIVE]),
        Task::AUTHOR => $faker->name,
    ];
});
