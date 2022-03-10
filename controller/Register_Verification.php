<?php
include '../model/User_Details_Table.php';

?>

<?php

if ($_SERVER['REQUEST_METHOD']=='POST')
    {  
        $flag=0;

        if(htmlspecialchars($_REQUEST['password'])!=htmlspecialchars($_REQUEST['confirm_password']))
        {
            $flag=1;
            echo "<script>alert('Please enter same password')</script>";
        }

        if(htmlspecialchars($_REQUEST['password']==""||htmlspecialchars($_REQUEST['confirm_password']=="")))
        {
            echo "<script>alert('Please enter the password')</script>";;
            $flag=1;
        }

        $mailformat = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
        $mediumPassword = '((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))';

        if(!preg_match($mailformat,htmlspecialchars($_REQUEST['email'])))
        {
            echo "<script>alert('Please enter valid email')</script>";
            $flag=1;
        }

        if(!preg_match($mailformat,htmlspecialchars($_REQUEST['email'])))
        {
            echo "<script>alert('Please enter Strong Password')</script>";
            $flag=1;
        }

        if (htmlspecialchars($_REQUEST['gender'])=="")
        {
            echo "<script>alert('Please select Gender')</script>";
            $flag=1;
        }

        if (htmlspecialchars($_REQUEST['username'])=="")
        {
            echo "<script>alert('Please enter Username')</script>";
            
            $flag=1;
        }
        

        if (htmlspecialchars($_REQUEST['name'])=="")
        {
            echo "<script>alert('Please enter name') </script>";
            $flag=1;
        }

        

        if( check_user_exist( htmlspecialchars( $_REQUEST['username'] ) ) )
        {
            echo "<script>alert('username is already exits') </script>";
            $flag=1;
        }

        if($flag==1)
        { 
            header('Location: ../view/Index.php');
            exit();
        }
        $usr= htmlspecialchars($_REQUEST['username']);
        $hashed_password = password_hash(htmlspecialchars($_REQUEST['password']), PASSWORD_DEFAULT);
        $email=htmlspecialchars($_REQUEST['email']);
        $name=htmlspecialchars($_REQUEST['name']);
        $gender=htmlspecialchars($_REQUEST['gender']);

        insert_data($name,$usr,$email,$hashed_password,$gender);

        header('Location: ../view/login.php');
    }
    else{
        header('Location: ../view/login.php');
    }
    
    
?>
        