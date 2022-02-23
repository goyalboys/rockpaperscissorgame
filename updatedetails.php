<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $conn = new mysqli($servername, $username, $password,"training_game");          
  if ($_SERVER['REQUEST_METHOD']=='POST')
  {
        $name=htmlspecialchars($_REQUEST['name']);
        $email=htmlspecialchars($_REQUEST['email']);
        $gender=htmlspecialchars($_REQUEST['gender']);
        $username=$_REQUEST['username'];
        $sql="UPDATE user_details SET name='$name',email='$email',gender='$gender' WHERE username = '$username'" ;
        $conn->query($sql);
        echo $conn->error;
        header('Location: profile_management.php');
        exit;
}
  $conn->close();

?>