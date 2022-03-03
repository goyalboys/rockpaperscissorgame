<?php

session_start();  
include '../model/User_Details_Table.php';

?>

<?php

  if ($_SERVER['REQUEST_METHOD']=='POST')
  {
    $username=htmlspecialchars($_REQUEST['username']);
    $password=htmlspecialchars($_REQUEST['password']);

    if($username=="")
      {
        echo"Alert: fill the username field";
        exit();
        header('Location: ../view/Login.php');
      }
      
    if($password=="")
      {
        echo "alert: fill the password field";
        exit();
        header('Location: ../view/Login.php');
      }

    if (!empty($_REQUEST['remember']))
      {
        setcookie($username, $password, time() + (86400 * 30), "/");
      }
            
    if ( check_user_password( $username, $password ) )
      {
        $_SESSION['user_active']=htmlspecialchars($_REQUEST['username']);
        $_SESSION['win']=0;
        $_SESSION['loose']=0;
        $_SESSION['tie']=0;
        $_SESSION['total']=0;
        $_SESSION['error']='';
        date_default_timezone_set('Asia/Calcutta'); 
        $timestamp = date('Y-m-d H:i:s');
        update_user_status($username,$timestamp);
        header('Location: ../view/Main.php');
      }
    else
      {
        echo "password wrong";
       //header('Location: ../view/Login.php');
      }
  }
  else
  {
     // header('Location: ../view/Login.php');
  }
  
?>
