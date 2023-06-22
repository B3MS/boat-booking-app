<?php

declare(strict_types = 1);

class UserController
{
    public function signupIndex() 
    {
        if(isset($_SESSION['username']))
        {
            header('Location: index.php');
            exit;
        }    
        else
        {
            require './View/signup.php';
        }
    }

    public function signup() 
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // Check passwords
            if($_POST['password'] === $_POST['passwordConfirm'])
            {
                // Prepare database connection
                require_once './config.php';
                require_once './Model/DatabaseManager.php';

                $databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
                $databaseManager->connect();

                // Check if username is taken.
                $user = new User($_POST['username'], $_POST['name'], $_POST['surname'], 
                $_POST['email'], $_POST['password'],);

                $sql = "SELECT username FROM users WHERE username = ?";
                $result = $databaseManager->connection->prepare($sql);
                $result->execute([$user->username]);
                $control = $result->fetchAll();
                
                if(empty($control))
                {
                    $sql = "INSERT INTO users (username, name, surname, email, password)
                    VALUES (?, ?, ?, ?, ?)";
                    $insert = $databaseManager->connection->prepare($sql);
                    $insert->execute([$user->username, $user->name, $user->surname,
                    $user->email, $user->password]);
                    $_SESSION['username'] = $user->username;
                    header('Location: index.php');
                    exit;
                }
                else
                {
                    header('Location: index.php?page=signup&error=User already exists');
                    exit;
                }
            }
            else
            {
                header('Location: index.php?page=signup&error=Passwords do not match');
                exit;
            }
        }
        else
        {
            header('Location: index.php');
            exit;
        }
    }
}