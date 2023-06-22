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

// Get current page
$page = $_GET['page'] ?? null;

// Load view
switch($page)
{
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