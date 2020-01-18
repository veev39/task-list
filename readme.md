## Task list app

## Installation

clone project

composer install

cp .env.example .env (configured for usage with laradock(https://github.com/laradock/laradock) )

artisan key:generate

artisan migrate --seed

## Test

run php vendor/bin/phpunit;