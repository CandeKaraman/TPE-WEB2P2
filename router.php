<?php
    require_once 'libs/router.php';
    require_once 'app/middleware/JWTAuthMiddleware';
    require_once 'app/controller/UserController.php';
    require_once 'app/controller/BookingController.php';
    require_once 'app/controller/DestinationController.php';


    $router = new Router();
    $router->addMiddleware(new JWTAuthMiddleware());

    $router->addRoute('destinations','GET','DestinationController', 'getAll');
    $router->addRoute('booking/:id', 'GET', 'BookingController', 'getBooking');
    $router->addRoute('booking/:id',  'PUT', 'BookingController','editBooking');


    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);

    


    


