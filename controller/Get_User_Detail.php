<?php
session_start();
    include '../model/User_Details_Table.php';
        
    include '../model/Rps_Scoreboard_table.php';

    if(!empty($_SESSION['user_active']))
     {
        $clicked_user=htmlspecialchars($_REQUEST['username']);
        $user_detail=clicked_user_detail($clicked_user); 
        if($user_detail==0)
        {
            $username=$clicked_user;
            $name ='user is not registred';
            $email='';
            $gender= '';        
            $loose=0;
            $win=0;
            $total=0;
            $tie=0;

        }   
        else{
            $username=$user_detail[0];
            $name =$user_detail[1];
            $email=$user_detail[2];
            $gender= $user_detail[3];

            $user_score=score_user($clicked_user);
        
            $loose=$user_score[0];
            $win=$user_score[1];
            $total=$user_score[2];
            $tie=$user_score[3];
        }    
        
    }
    else{
        
        header('Location: ../view/Login.php');
        exit();
    }
?>