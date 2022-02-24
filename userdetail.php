<?php
    session_start();
    if(!empty($_SESSION['useractive']))
     {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new mysqli($servername, $username, $password,"training_game");  
        $user=$_REQUEST['username'];
        $sql="select username,name,email,gender from user_details where username=".$user;
        $out=$conn->query($sql);
        echo $conn->error;
        $name1='';
        $user1='';
        $email1='';
        $gender1='';
        $loose1='';
        $tie1='';
        $total1='';
        $win1='';
        while($row = $out->fetch_assoc()) 
        {
            $user1=$row['username'];
            $name1 =$row['name'];
            $email1=$row['email'];
            $gender1= $row['gender'];
        }
        $sql="select  loose,win,tie,total from rps_scoreboard where username=".$user;
        $out=$conn->query($sql);
        while($row = $out->fetch_assoc()) 
        {
            $loose1=$row['loose'];
            $win1=$row['win'];
            $total1=$row['total'];
            $tie1=$row['tie'];
        }
    }
    else{
        
        header('Location: login.html');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/rps.jpg">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div class="navigation-bar">
        <ul>
            <li><a class="active" href="main.html">RPS</a></li>
            <li style="float:right"><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="arrange">
        <div style="text-align: justify; text-justify: inter-word;">
            <h1 style="text-align=centre;"> User Profile</h1>
            <div>
                UserName:
                <?php echo $user1. "<br>"?>
            </div> 
            <div  >
                Name:
                <?php echo $name1;?>
            <div  >
                Email:
                <?php echo $email1."<br>"?>
            </div>
            <div  >
                Gender:
                <?php echo $gender1;?>
            </div>
            <div  >
                Match Played:
                <?php echo $total1;?>
            </div>
            <div  >
                Match Won:
                <?php echo $win1;?>
            </div>
            <div  >
                Match loose:
                <?php echo $loose1;?>
            </div>
            <div  >
                Match Tie:
                <?php echo $tie1;?>
            </div>
        </div>

        <hr>
        <a href="main.html" style="text-decoration: none;">
        <button type=button style="display: flex;justify-content: center;align-items: center;border: 3px solid green;"> 
        Go Back
        </button></a>     
    </div>
</body>
</html>






