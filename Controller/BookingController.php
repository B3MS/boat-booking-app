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
            SELECT bookings.id, users.name, users.surname, bookings.date, boats.name AS boatname, boats.price  
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
                $bookings[] = new Booking($rawBooking['id'], $rawBooking['name'], $rawBooking['surname'], $rawBooking['date'], 
                $rawBooking['boatname'], $rawBooking['price']);
            }

            return $bookings;
        }
        
    }

    public function addBooking() 
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['username']))
        {
            // Prepare database connection
            require_once './config.php';
            require_once './Model/DatabaseManager.php';

            $databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
            $databaseManager->connect();

            $date = date("Y-m-{$_POST['day']}");

            $sql = "SELECT id FROM users WHERE username = '{$_SESSION['username']}'";
            $user = $databaseManager->connection->prepare($sql);
            $user->execute();
            $userid = $user->fetchAll();

            $sql = "INSERT INTO bookings (user_id, boat_id, date)
            VALUES (?, ?, ?)";
            $insert = $databaseManager->connection->prepare($sql);
            $insert->execute([$userid[0]['id'], $_POST['boatid'], $date]);

            header('Location: index.php?page=account');
            exit;
        }
        else
        {
            header("Location: index.php?page=boats");
            exit;
        }
    }

    public function changeBooking()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['username']))
        {
            // Prepare database connection
            require_once './config.php';
            require_once './Model/DatabaseManager.php';

            $databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
            $databaseManager->connect();

            $sql = "SELECT * FROM bookings
            JOIN users ON users.id = bookings.user_id
            WHERE users.username = '{$_SESSION['username']}'
            AND bookings.id = {$_POST['bookingId']}";
            $result = $databaseManager->connection->prepare($sql);
            $result->execute();
            $control = $result->fetchAll();

            if(!empty($control))
            {
                $sql = "UPDATE bookings
                SET date = '{$_POST['date']}'
                WHERE id = {$_POST['bookingId']}";
                $update = $databaseManager->connection->prepare($sql);
                $update->execute();

                header("Location: index.php?page=account");
                exit;
            }
        }
        else
        {
            header("Location: index.php?page=home");
            exit;
        }
    }

    public function deleteBooking()
    {
        
    }
}