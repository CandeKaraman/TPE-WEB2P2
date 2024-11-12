<?php
    require_once 'libs/router.php';
    require_once 'app/middleware/JWTAuthMiddleware';
    require_once 'app/controller/UserController.php';
    require_once 'app/controller/BookingController.php';
    require_once 'app/controller/DestinationController.php';


    $router = new Router();
    $router->addMiddleware(new JWTAuthMiddleware());

    $router->addRoute('reservas', 'GET','BookingController','getAll');
    $router->addRoute('destinations','GET','DestinationController', 'getAll');


    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);

    


    


