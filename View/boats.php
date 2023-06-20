<?php require './View/includes/header.php' ?>
  
<div class="boats">
    <?php foreach ($boats as $boat) : ?>
        <div class="boat">
            <span><?= $boat->name ?></span>
            <span><?= $boat->type ?></span>
            <span><?= $boat->capacity ?></span>
            <span><?= $boat->price ?></span>
            <a href="index.php?page=boatBooking&boatId=<?= $boat->id ?>">Rent</a>
        </div>
    <?php endforeach; ?>
</div>

<?php require './View/includes/footer.php' ?>