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

    private function getBoats() : array
    {
        // Prepare database connection
        require_once './config.php';
        require_once './Model/DatabaseManager.php';

        $databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
        $databaseManager->connect();

        // Fetch all boats from database
        $sql = "SELECT * FROM boats";
        $rawBoats = $databaseManager->connection->query($sql)->fetchAll();

        $boats = [];

        foreach($rawBoats as $rawBoat)
        {
            $boats[] = new Boat($rawBoat['id'], $rawBoat['name'], $rawBoat['type'], $rawBoat['capacity'], $rawBoat['price']);
        }

        return $boats;
    }
}