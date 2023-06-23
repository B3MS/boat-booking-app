<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
    <title>Boat Booking</title>
</head>
<body>
<div class="container">
    <div class="info">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis autem dolor perferendis obcaecati aspernatur eos soluta iste quo. Optio fugit nam nobis dolores commodi facere, ipsum reprehenderit dolor vel iure.
    </div>
    <nav>
        <img src="./assets/img/logo.jpg" alt="logo">
        <div class="links">
            <a href="index.php?page=home">Home</a>
            <a href="index.php?page=about">About</a>
            <a href="index.php?page=boats">Boats</a>
        </div>
        <?php
            if(isset($_SESSION['username']))
            {
                echo 
                "<div class='account'>
                    <p>Welcome back, </br> {$_SESSION['username']}</br><a href='./index.php?page=logout'>Log Out</a></p>
                    <a href='./index.php?page=account'><img src='./assets/img/account.png' alt='account'></a>
                </div>";
            }
            else
            {
                echo 
                "<div class='account'>
                    <p>
                        <a href='./index.php?page=signup'>Sign Up</a></br>
                        <a href='./index.php?page=login'>Log In</a>
                    </p>
                    <a href='./index.php?page=signup'><img src='./assets/img/account.png' alt='account'></a>
                </div>";
            }
        ?>
    </nav>