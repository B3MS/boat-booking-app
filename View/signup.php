<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <form action="./index.php?page=signupHandler" method="post">
            <?php
                if(isset($_GET['error']))
                {   
                    echo "<div class='error'>{$_GET['error']}</div>";
                }
            ?>
            <div class="inputs">
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" required>

                <label for="name">Name: </label>
                <input type="text" name="name" id="name" required>

                <label for="surname">surname</label>
                <input type="text" name="surname" id="surname" required>

                <label for="email">E-mail: </label>
                <input type="email" name="email" id="email" required>

                <label for="password">Password: </label>
                <input type="password" name="password" id="password" required>

                <label for="passwordConfirm">Confirm Password: </label>
                <input type="password" name="passwordConfirm" id="passwordConfirm" required>
            </div>
            <input type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>