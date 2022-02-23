<?php
session_start();
$usern= $_SESSION['useractive'];
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password,"training_game");          
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $sql="select password from user_details where username='$usern'";
    $out=$conn->query($sql);
    echo $conn->error;
    $pwd=htmlspecialchars($_REQUEST['curr_pwd']);
    while($row = $out->fetch_assoc()) 
        $output=$row["password"];
    if (password_verify($pwd, $output))
    {
        $pwd=htmlspecialchars($_REQUEST['curr_pwd']);
        date_default_timezone_set('Asia/Calcutta'); 
        $timestamp = date('Y-m-d H:i:s');
        $hashed_password = password_hash(htmlspecialchars($_REQUEST['pwd']), PASSWORD_DEFAULT);
        $sql = "UPDATE user_details SET active='$timestamp', password='$hashed_password' WHERE username='$usern'";
        $conn->query($sql);
        echo $conn->error;
        header('Location: profile_management.php');
        exit;
    }
    else
    {
        header('Location: changepassword.php');
            exit;
    }

}
?>