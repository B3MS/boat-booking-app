<?php

class AccountController
{
    public function index()
    {
        if(isset($_SESSION['username']))
        {
            $bookingcontroller = new BookingController;
            $bookings = $bookingcontroller->getBookings();

            $usercontroller = new UserController;
            $user = $usercontroller->getUser();

            require './View/account.php';
        }    
        else
        {
            header('Location: index.php');
            exit;
        }  
    }
}
