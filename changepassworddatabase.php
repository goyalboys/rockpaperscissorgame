<?php
$usern= $_SESSION['useractive'];
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password,"training_game");          
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $sql="select password from user_details where username='$usern'";
    $out=$conn->query($sql);
    $pwd=htmlspecialchars($_REQUEST['curr_pwd']);
    while($row = $result->fetch_assoc()) 
        $output=$row["password"];
    if (password_verify($pwd, $output))
    {
        $pwd=htmlspecialchars($_REQUEST['curr_pwd']);

        $_SESSION['useractive']=htmlspecialchars($_REQUEST['username']);
        $usern=htmlspecialchars($_REQUEST['username']);
        date_default_timezone_set('Asia/Calcutta'); 
        $timestamp = date('Y-m-d H:i:s');
        $sql = "UPDATE user_details SET active='$timestamp' password='$pwd' WHERE username='$usern'";
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