<?php require './View/includes/header.php' ?>
  
<div class="details">
    <img src="<?= $boat->img ?>" alt="<?= $boat->type ?>">
    <div class="bookingInfo">
        <span><?= $boat->name ?></span>
        <span><?= $boat->type ?></span>
        <span>Capacity: <?= $boat->capacity ?></span>
        <span>Price: <?= $boat->price ?></span>
        
        <?php
            if(isset($_SESSION['username']))
            {
                echo '<form action="./index.php?page=addBooking" method="post"><div class="calendar">';
                echo '<div class="days">Mon</div><div class="days">Tue</div><div class="days">Wed</div>
                <div class="days">Thu</div><div class="days">Fri</div><div class="days">Sat</div>
                <div class="days">Sun</div>';
                $firstDay = date('D', strtotime(date('01-m-Y')));
                switch($firstDay)
                {
                    case 'Mon':
                        $empty = 6;
                        break;
                    case 'Tue':
                        $empty = 5;
                        break;
                    case 'Wed':
                        $empty = 4;
                        break;
                    case 'Thu':
                        $empty = 3;
                        break;
                    case 'Fri':
                        $empty = 2;
                        break;
                    case 'Sat':
                        $empty = 1;
                        break;
                    case 'Sun':
                        $empty = 0;
                        break;
                }
                for($empty; $empty<6; $empty++)
                {
                    echo "<div class='empty'></div>";
                }

                $days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
                for($i = 1; $i<$days+1; $i++)
                {
                    echo "
                    <div>
                    <input type='radio' id='{$i}' name='day' value='{$i}'>
                    <label for='{$i}'>{$i}</label></br>
                    </div>
                    ";
                }

                echo '</div><input type="submit" value="Book Now!"></form>';
            }
            else
            {
                echo "<a href='./index.php?page=login'>Log in to book this boat!</a>";
            }
        ?>
    </div>
</div>

<?php require './View/includes/footer.php' ?>