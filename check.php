<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $conn = new mysqli($servername, $username, $password,"mydb");          
  if ($_SERVER['REQUEST_METHOD']=='POST')
  {
      $user=htmlspecialchars($_REQUEST['username']);
      $pwd=htmlspecialchars($_REQUEST['pswd']);
      if (!empty($_REQUEST['remember']))
      {
        setcookie($user, $pwd, time() + (86400 * 30), "/");
      }
      $sql="select password from Mytable where username='$user'";
      $result= $conn->query($sql);
      $output='';
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
        $sql = "UPDATE mytable SET active='$timestamp' WHERE username='$usern'";
        $conn->query($sql);
        header('Location: main.html');
        exit;
      }
      else
      {
          header('Location: login.html');
            exit;
      }
  }
  $conn->close();
?>

