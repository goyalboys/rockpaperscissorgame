<?php
include '../model/User_Details_Table.php';

?>

<?php

if ($_SERVER['REQUEST_METHOD']=='POST')
    {  
        $flag=0;
        
         try
         {
            if(htmlspecialchars($_REQUEST['password'])!=htmlspecialchars($_REQUEST['confirm_password']))
            {
                $flag=1;
                echo "<script>alert('Please enter same password')</script>";
                throw new Exception("enter same password");
            }

            if(htmlspecialchars($_REQUEST['password']==""||htmlspecialchars($_REQUEST['confirm_password']=="")))
            {
                echo "<script>alert('Please enter the password')</script>";;
                $flag=1;
                throw new Exception("enter the password");
            }

            $mailformat = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
            $mediumPassword = '((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))';

            if(!preg_match($mailformat,htmlspecialchars($_REQUEST['email'])))
            {
                echo "<script>alert('Please enter valid email')</script>";
                $flag=1;
                throw new Exception("enter valid email");
            }

            if(!preg_match($mailformat,htmlspecialchars($_REQUEST['email'])))
            {
                echo "<script>alert('Please enter Strong Password')</script>";
                $flag=1;
                throw new Exception("enter strong password");
            }

            if (htmlspecialchars($_REQUEST['gender'])=="")
            {
                echo "<script>alert('Please select Gender')</script>";
                $flag=1;
                throw new Exception("enter gender");
            }

            if (htmlspecialchars($_REQUEST['username'])=="")
            {
                echo "<script>alert('Please enter Username')</script>";
                
                $flag=1;
                throw new Exception("enter username");
            }
            

            if (htmlspecialchars($_REQUEST['name'])=="")
            {
                echo "<script>alert('Please enter name') </script>";
                $flag=1;
                throw new Exception("enter name");
            }

            

            if( check_user_exist( htmlspecialchars( $_REQUEST['username'] ) ) )
            {
                echo "<script>alert('username is already exits') </script>";
                $flag=1;
                throw new Exception("user is already exits");
            }


        }
        catch(exception $e)
        {

            if($flag==1)
            { 
                header('Location: ../view/Index.php');
                exit();
            }

        }

        $user= htmlspecialchars($_REQUEST['username']);
        $hashed_password = password_hash(htmlspecialchars($_REQUEST['password']), PASSWORD_DEFAULT);
        $email=htmlspecialchars($_REQUEST['email']);
        $name=htmlspecialchars($_REQUEST['name']);
        $gender=htmlspecialchars($_REQUEST['gender']);

        start_transaction($conn);
        try{
            insert_data($conn,$name,$user,$email,$hashed_password,$gender);  
            throw new Exception();
        }
        catch(Exception $e){
            rollback_transaction($conn);

        }
        finally{
            commit_transaction($conn);
        }
        
        header('Location: ../view/login.php'); 
    }
    else{
        header('Location: ../view/login.php');
    }
    
?>
        
