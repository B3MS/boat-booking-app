<?php require './View/includes/header.php' ?>

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
        <div class="account">
            <p>Welcome back, </br> name</p>
            <a href="./index.php?page=account"><img src="./assets/img/account.png" alt="account"></a>
        </div>
    </nav>
    <div class="content">
        <div class="lef"></div>
        <div class="center">
            <div class="cta">
                <h1>Welcome to [boating service]</h1>
                <p>A boat booking service for you!</p>
                <a href="index.php?page=boats">Book A Boat Now</a>
            </div>
        </div>
        <div class="right"></div>
    </div>
</div>

<?php require './View/includes/footer.php' ?>