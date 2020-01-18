<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', ['middleware' => 'bindings', 'namespace'=>'App\Http\Controllers\Api\v1'], function (Router $api) {
    $api->group(['prefix' => 'v1/tasks'], function (Router $api) {
        $api->get('', 'TaskApiController@index');
        $api->get('/{task}', 'TaskApiController@show');
    });
});
