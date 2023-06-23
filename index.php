<?php

declare(strict_types=1);

// Include all models
require 'Model/Boat.php';
require 'Model/Booking.php';
require 'Model/User.php';

// Include all controllers
require 'Controller/BoatController.php';
require 'Controller/BookingController.php';
require 'Controller/UserController.php';
require 'Controller/HomeController.php';

session_start();

// Get current page
$page = $_GET['page'] ?? null;

// Load view
switch($page)
{
    case 'logout';
        (new UserController())->logout();
        break;
    case 'loginHandler';
        (new UserController())->loginHandler();
        break;
    case 'login':
        (new UserController())->loginIndex();
        break;
    case 'signupHandler':
        (new UserController())->signup();
        break;
    case 'signup':
        (new UserController())->signupIndex();
        break;
    case 'boats':
        (new BoatController())->index();
        break;
    case 'home':
    default:
        (new HomeController())->home();
        break;

}