<?php
    require_once 'libs/router.php';

    require_once 'app/middleware/JtwAuthMiddleware';
    require_once 'app/controller/UserApiController.php';
    require_once 'app/controller/BookingApiController.php';
    require_once 'app/controller/DestinationApiController.php';

    $router = new Router();
    $router->addMiddleware(new JWTAuthMiddleware());

    $router->addRoute('reservas', 'GET','BookingApiController','getAll');
    $router->addRoute('destinations','GET','DestinationApiController', 'getAll');
    $router->addRoute('destinations/:id', 'GET', 'DestinationApiController', 'getDestination');
    $router->addRoute('destination', 'POST', 'DestinationApiController', 'addDestination' );


    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);

