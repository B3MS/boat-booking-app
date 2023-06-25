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
            <?php foreach ($bookings as $booking) : ?>
                <div class="booking">
                    <span><?= $booking->name ?></span>
                    <span><?= $booking->surname ?></span>
                    <span><?= $booking->boatname ?></span>
                    <span><?= $booking->date ?></span>
                    <span>&euro; <?= $booking->price ?></span>
                    <span><a href="index.php?page=changeBooking&bookingId=<?= $booking->id ?>">Change</a></span>
                    <span><a href="index.php?page=deleteBooking&bookingId=<?= $booking->id ?>">Delete</a></span>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="accountInfo">
            <a href="index.php?page=home">Back To Home</a>
            <a href="index.php?page=logout">Log Out</a>
        </div>
    </div>
</body>
</html>