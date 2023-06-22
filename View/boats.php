<?php require './View/includes/header.php' ?>
  
<div class="boats">
    <div class="boat-container">
        <div class="boat">
            <span>Name</span>
            <span>Type</span>
            <span>Capacity</span>
            <span>Price</span>
            <span></span>
        </div>
        <?php foreach ($boats as $boat) : ?>
            <div class="boat">
                <span><?= $boat->name ?></span>
                <span><?= $boat->type ?></span>
                <span><?= $boat->capacity ?></span>
                <span>&euro; <?= $boat->price ?></span>
                <span><a href="index.php?page=boatBooking&boatId=<?= $boat->id ?>">Rent</a></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require './View/includes/footer.php' ?>