<?php
    include '../controller/get_user_detail.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/rps.jpg">
    <link rel="stylesheet" href="../styles.css">
    <title>Document</title>
</head>
<body>
    <div class="navigation-bar">
        <ul>
            <li><a class="active" href="main.php">RPS</a></li>
            <li style="float:right"><a href="../controller/Logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="arrange">
        <div style="text-align: justify; text-justify: inter-word;">
            <h1 style="text-align=centre;"> User Profile</h1>
            <div>
                UserName:
                <?php echo $username. "<br>"?>
            </div> 
            <div  >
                Name:
                <?php echo $name;?>
            <div  >
                Email:
                <?php echo $email."<br>"?>
            </div>
            <div  >
                Gender:
                <?php echo $gender;?>
            </div>
            <div  >
                Match Played:
                <?php echo $total;?>
            </div>
            <div  >
                Match Won:
                <?php echo $win;?>
            </div>
            <div  >
                Match loose:
                <?php echo $loose;?>
            </div>
            <div  >
                Match Tie:
                <?php echo $tie;?>
            </div>
        </div>

        <hr>
        <a href="Main.php" style="text-decoration: none;">
        <button type=button style="display: flex;justify-content: center;align-items: center;border: 3px solid green;"> 
        Go Back
        </button></a>     
    </div>
</body>
</html>






