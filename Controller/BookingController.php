<?php

declare(strict_types = 1);

class BookingController
{
    public function account()
    {
        if(isset($_SESSION['username']))
        {
            $bookings = $this->getBookings();  

            require './View/account.php';
        }    
        else
        {
            header('Location: index.php');
            exit;
        }  
    }

    private function getBookings()
    {
        if(isset($_SESSION['username']))
        {
            // Prepare database connection
            require_once './config.php';
            require_once './Model/DatabaseManager.php';

            $databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
            $databaseManager->connect();

            // Fetch all bookings from database
            $sql = "
            SELECT users.name, users.surname, bookings.date, boats.name AS boatname, boats.price  
            FROM bookings
            JOIN users ON users.id = bookings.user_id
            JOIN boats ON boats.id = bookings.boat_id
            ";
            $result = $databaseManager->connection->prepare($sql);
            $result->execute();
            $rawBookings = $result->fetchAll();
            
            $bookings = [];

            foreach($rawBookings as $rawBooking)
            {
                $bookings[] = new Booking($rawBooking['name'], $rawBooking['surname'], $rawBooking['date'], 
                $rawBooking['boatname'], $rawBooking['price']);
            }

            return $bookings;
        }
        
    }

    public function addBooking() 
    {

    }

    public function changeBooking()
    {

    }

    public function deleteBooking()
    {
        
    }
}