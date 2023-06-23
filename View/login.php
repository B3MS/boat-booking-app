<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Log In</title>
</head>
<body>
    <div class="container">
        <form action="./index.php?page=loginHandler" method="post">
            <?php
                if(isset($_GET['error']))
                {   
                    echo "<div class='error'>{$_GET['error']}</div>";
                }
            ?>
            <div class="inputs">
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" required>

                <label for="password">Password: </label>
                <input type="password" name="password" id="password" required>
            </div>
            <input type="submit" value="Log In">
        </form>
    </div>
</body>
</html>