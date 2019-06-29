<?php

/**
 * @var \Core\Router $router;
 */
$router->get('**', '123@12') ;


$router->get('/', 'App\Controllers\HomeController@index');


$router->get('home/{id}', function ($id) {

    echo 'Your home ID: ', $id;

});

$router->get('src/public/home/index', function () {

    echo 'Home/index';
});