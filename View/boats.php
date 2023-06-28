<?php require './View/includes/header.php' ?>
  
<div class="boats">
    <?php foreach ($boats as $boat) : ?>
        <div class="boat">
            <a href="./index.php?boatid=<?= $boat->id ?>">
                <img src="<?= $boat->img ?>" alt="<?= $boat->type ?>">
                <span><?= $boat->name ?></span>
            </a>
        </div>
    <?php endforeach; ?>
</div>

<?php require './View/includes/footer.php' ?>