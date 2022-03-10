<?php
session_start();
include '../model/User_Details_Table.php';



if($_REQUEST['type']=='register_page')
{
        if (check_user_exist($_REQUEST['username']))
        {
            echo 'username is already exists';
        }
}
else
{
    if($_REQUEST['type']=='login_page')
    {
        $username=$_REQUEST['username'];
        if(!check_user_password($username,$_REQUEST['password']))
        {
            echo 'invalid credentials';
        }

    }
    else{
        if($_REQUEST['type']=='change_password_page')
        {
            $user_active=$_SESSION['user_active'];
            if(!check_user_password($user_active,$_REQUEST['current_password']))
            {
                echo 'current password is wrong';
            }

        }
    }
}



?>