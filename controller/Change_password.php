<?php

    session_start();
    include '../model/User_Details_Table.php';

    if(!empty($_SESSION['user_active']))
     {
        $username= $_SESSION['user_active'];        
        if ($_SERVER['REQUEST_METHOD']=='POST')
        {
            $password=htmlspecialchars($_REQUEST['current_password']);   
            if (check_user_password($username,$password))
            {
                $password=htmlspecialchars($_REQUEST['password']);
                date_default_timezone_set('Asia/Calcutta'); 
                $timestamp = date('Y-m-d H:i:s');
                $hashed_password = password_hash(htmlspecialchars($_REQUEST['password']), PASSWORD_DEFAULT);
                update_password($username,$hashed_password,$timestamp);
               
               header('Location: ../view/profile_management.php');
            }
            else
            {
                header('Location: ../view/changepassword.php');
                exit;
            }
        }
}
else{
        header('Location: ../view/login.php');
        exit();
}

?>