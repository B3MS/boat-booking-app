<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/account.css">
    <title><?= $_SESSION['username'] ?></title>
</head>
<body>
    <div class="container">
        <div class="bookings">
            <h1>My Bookings</h1>
            <div class="booking">
                <span>Boat</span>
                <span>Date</span>
                <span>Price</span>                
            </div>
            <hr>
            <?php foreach ($bookings as $booking) : ?>
                <div class="booking">
                    <span><?= $booking->boatname ?></span>
                    <span><?= $booking->date ?></span>
                    <span>&euro; <?= $booking->price ?></span>
                    <form action="index.php?page=changeBooking" method="post">
                        <input type="text" name="bookingId" id="bookingId" value="<?= $booking->id ?>" style="display:none">
                        <input type="date" name="date" id="date">
                        <input type="submit" value="Change Date">
                    </form>
                    <span><a href="index.php?page=deleteBooking&bookingId=<?= $booking->id ?>">Delete</a></span>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="accountInfo">
            <span>Hello, <?= $user->username ?></span>
            <span>Name: <br> <?= $user->name ?> <?= $user->surname ?></span>
            <span>E-mail: <br> <?= $user->email ?></span>
            <div class="empty"></div>
            <a href="index.php?page=home">Back To Home</a>
            <a href="index.php?page=logout">Log Out</a>
        </div>
    </div>
</body>
</html>