<?php
//include_once 'user.php';
//include_once 'databaseinitialisation.php';
$servername = "localhost";
$username = "root";
$password = "";
// Create connection with mysql server
$conn = new mysqli($servername, $username, $password,"mydb");  
$user=$_REQUEST['username'];
//echo $user."<br>";
$sql="select username,name,email,gender,loose,win,tie,total from mytable where username=".$user;
//echo $sql;
$out=$conn->query($sql);
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
    $loose1=$row['loose'];
    $win1=$row['win'];
    $total1=$row['total'];
    $tie1=$row['tie'];
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<div class="navbar">
        <ul>
            <li><a class="active" href="main.html">Rockpprsscr</a></li>
            <li style="float:right"><a href="login.html">logout</a></li>
          </ul>
    </div>
    <div class="arrange">
    <div style="align">
        <h1 style="text-align=centre;"> User Profile</h1>
        <div>
            <div>
                <div class="entity">
                UserName:
                    <?php echo $user1. "<br>"?>
                </div> 
                <div class="entity">
                Name:
                    <?php echo $name1;?>
            </div>
            </div>

            <div>
            <div class="entity">
                Email:
                    <?php echo $email1."<br>"?>
            </div>
            <div class="entity">
                    Gender:
                    <?php echo $gender1;?>
            </div>

            <div class="entity">
                    Match Played:
                    <?php echo $total1;?>
            </div>

            <div class="entity">
                    Match Won:
                    <?php echo $win1;?>
            </div>
            <div class="entity">
                    Match loose:
                    <?php echo $loose1;?>
            </div>
            <div class="entity">
                    Match Tie:
                    <?php echo $tie1;?>
            </div>


            </div>
        </div>
        
    </div>
    <a href="main.html" style="text-decoration: none;">
    <button type=button style="display: flex;
  justify-content: center;
  align-items: center;
  border: 3px solid green;"> Go Back </button></a>
</div>
  
</body>
</html>






