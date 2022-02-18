<?php
// Start the session
session_start();
 $servername = "localhost";
 $username = "root";
 $password = "";

 // Create connection with mysql server
 $conn = new mysqli($servername, $username, $password,"mydb");          

 if ($_SERVER['REQUEST_METHOD']=='POST'){
    $user=htmlspecialchars($_REQUEST['username']);
    $pwd=htmlspecialchars($_REQUEST['pswd']);
  
    $sql="select password from Mytable where username='$user'";
    $result= $conn->query($sql);
    //echo $result;
    $output='';
    while($row = $result->fetch_assoc()) 
            {
                $output=$row["password"];
                //echo "New record created successfully. Last inserted ID is: " . $result;
            }
            
    if (password_verify($pwd, $output)){
      //$_SESSION['useractive']=$user;
        header('Location: main.html');
          exit;
    }
    else{
        header('Location: login.html');
          exit;
    }
   //include 'main.html';
 }
 $conn->close();
?>

