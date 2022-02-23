<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $conn = new mysqli($servername, $username, $password,"training_game");          
  if ($_SERVER['REQUEST_METHOD']=='POST')
  {
      $user=htmlspecialchars($_REQUEST['username']);
      $pwd=htmlspecialchars($_REQUEST['pswd']);
      if (!empty($_REQUEST['remember']))
      {
        setcookie($user, $pwd, time() + (86400 * 30), "/");
      }
      $sql="select password from user_details where username='$user'";
      $result= $conn->query($sql);
      $output='';
      echo $conn->error;
      while($row = $result->fetch_assoc()) 
        $output=$row["password"];
      
      if (password_verify($pwd, $output))
      {
        $_SESSION['useractive']=htmlspecialchars($_REQUEST['username']);
        $usern=htmlspecialchars($_REQUEST['username']);
        $_SESSION['win']=0;
        $_SESSION['loose']=0;
        $_SESSION['tie']=0;
        $_SESSION['total']=0;
        date_default_timezone_set('Asia/Calcutta'); 
        $timestamp = date('Y-m-d H:i:s');
        $sql = "UPDATE user_details SET active='$timestamp' WHERE username='$usern'";
        $conn->query($sql);
        echo $conn->error;
        $conn->close();
        header('Location: main.html');
        exit;
      }
      else
      {
          $conn->close();
          header('Location: login.html');
           exit;
      }
  }
  else
  {
    $conn->close();
    header('Location: login.html');
    exit;
  }
  
?>
