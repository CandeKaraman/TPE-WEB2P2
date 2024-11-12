<?php
    require_once 'libs/router.php';
    require_once 'app/middleware/JtwAuthMiddleware';
    require_once 'app/controller/UserController.php';
    require_once 'app/controller/BookingController.php';
    require_once 'app/controller/DestinationController.php';

    $router = new Router();
    $router->addMiddleware(new JWTAuthMiddleware());

    //$router->addRoute('reservas', 'GET','BookingController','getAll');
    $router->addRoute('destinos','GET','DestinationController', 'getAll');


    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);

    //veamos si funciona 
