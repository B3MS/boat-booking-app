<?php

declare(strict_types=1);

// Include all models
require 'Model/Boat.php';
require 'Model/Booking.php';
require 'Model/User.php';

// Include all controllers
require 'Controller/AccountController.php';
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
    case 'deleteBooking':
        (new BookingController())->deleteBooking();
        break;
    case 'changeBooking':
        (new BookingController())->changeBooking();
        break;
    case 'addBooking':
        (new BookingController())->addBooking();
        break;
    case 'account':
        (new AccountController())->index();
        break;
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
    case 'details':
        (new BoatController())->show();
        break;
    case 'home':
    default:
        (new HomeController())->home();
        break;

}