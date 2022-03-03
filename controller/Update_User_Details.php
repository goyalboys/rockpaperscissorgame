<?php
  session_start();
  include '../model/User_Details_Table.php';


  if(!empty($_SESSION['user_active']))
  {        
    if ($_SERVER['REQUEST_METHOD']=='POST')
    {
          $name=htmlspecialchars($_REQUEST['name']);
          $email=htmlspecialchars($_REQUEST['email']);
          $gender=htmlspecialchars($_REQUEST['gender']);
          $username=$_REQUEST['username'];
          update_details($username,$email,$gender,$name);
          
          header('Location: ../view/profile_management.php');
          exit;
    }
  }
  else
  {
    header('Location: ../view/Login.php');
    exit();
  }
?>