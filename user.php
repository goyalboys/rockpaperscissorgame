<?php
   session_start();
   if(!empty($_SESSION['useractive']))
    {
    $sql="select username,active from user_details ";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password,"training_game");  
    $result=$conn->query($sql);
    $output=array();
    $str="";
    $ac=" 🟢";
    date_default_timezone_set('Asia/Calcutta'); 
    $timestamp = date('Y-m-d H:i:s');
    $datetime_from = date("Y-m-d H:i:s",strtotime("-5 minutes",strtotime($timestamp)));

    while($row = $result->fetch_assoc()) 
        {
            $ac="🟢";
            if($row['active']<$datetime_from)
                {$ac="🔴";}
            $str.="<div style='color:white;'><a href=".'userdetail.php?username='."'".$row['username']."'"."  style='color: white;text-align: center;text-decoration: none;'>". $ac.$row["username"]."</a></div>"."<br>";
        }
    echo $str;
    echo "-@"."<a href='profile_management.php'>".$_SESSION['useractive']."</a>";
    }
    else{
        echo "-1";
        //header('Location: login.html');
     //   exit;
    }
?>
