<?php

declare(strict_types = 1);

class BoatController
{
    public function index() : void
    {
        // Load data
        $boats = $this->getBoats();

        // Load View
        require './View/boats.php';
    }

    public function show() 
    {
        // Load data
        $boat = $this->details();

        // Load View
        require './View/details.php';
    }

    private function getBoats() : array
    {
        // Prepare database connection
        require_once './config.php';
        require_once './Model/DatabaseManager.php';

        $databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
        $databaseManager->connect();

        // Fetch all boats from database
        $sql = "SELECT * FROM boats";
        $result = $databaseManager->connection->prepare($sql);
        $result->execute();
        $rawBoats = $result->fetchAll();

        $boats = [];

        foreach($rawBoats as $rawBoat)
        {
            $boats[] = new Boat($rawBoat['id'], $rawBoat['name'], $rawBoat['type'], $rawBoat['capacity'], 
            $rawBoat['price'], $rawBoat['img']);
        }

        return $boats;
    }

    private function details() 
    {
        // Prepare database connection
        require_once './config.php';
        require_once './Model/DatabaseManager.php';

        $databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
        $databaseManager->connect();

        // Fetch boat
        $sql = "SELECT * FROM boats WHERE id = {$_GET['boatid']}";
        $result = $databaseManager->connection->prepare($sql);
        $result->execute();
        $rawBoats = $result->fetchAll();
        
        // Checking for valid id in case of manual input in url.
        if(!empty($rawBoats))
        {
            $boat = new Boat($rawBoats[0]['id'], $rawBoats[0]['name'], $rawBoats[0]['type'], $rawBoats[0]['capacity'], 
            $rawBoats[0]['price'], $rawBoats[0]['img']);

            return $boat;
        }
        else
        {
            header('Location: index.php?page=boats');
            exit;
        }
    }
}