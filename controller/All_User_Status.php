<?php
    
   session_start();

   include '../model/User_Details_Table.php';

   if(!empty($_SESSION['user_active']))
    {
    $result=get_all_username();
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
            $str.="<div style='color:white;'><a href=".'User_Detail.php?username='."'".$row['username']."'"."  style='color: white;text-align: center;text-decoration: none;'>". $ac.$row["username"]."</a></div>"."<br>";
        }
    echo $str;

    echo "-@"."<a href='Profile_Management.php'>".$_SESSION['user_active']."</a>";
    }
    else{
        echo "-1";
    }
?>
