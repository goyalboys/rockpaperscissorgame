<?php
    session_start();
    include '../model/User_Details_Table.php';
    
    if(!empty($_SESSION['user_active']))
    {
        $out=profile_detail($_SESSION['user_active']);
        $username=$_SESSION['user_active'];
        
        $name='';
        $username='';
        $email='';
        $gender='';
        $password='';
        while($row = $out->fetch_assoc()) 
        {
            $username=$row['username'];
            $name =$row['name'];
            $email=$row['email'];
            $gender= $row['gender'];
            $password=$row['password'];
        }
    }
    else{
    
        header('Location: ../view/Login.php');
        exit();
    }
    ?>