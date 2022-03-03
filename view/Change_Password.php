<?php
session_start();
    
    if(empty($_SESSION['user_active']))
    {
        header('Location: login.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/rps.jpg">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../styles.css">
    <script src="../script.js"></script>

    <title>change password</title>
    <script>

        function validate_password()
        {
            let password = document.forms["myForm"]["pwd"].value;
            let cpassword = document.forms["myForm"]["cnfrpwd"].value;
            if(password !=cpassword)
            {
                document.getElementById('warning').innerHTML="Both password will be same";
                return false;
            }
            if(password=="")
            {
                document.getElementById('warning').innerHTML="please enter password";
                return false;
            }
        }

    </script>
</head>
<body>
    <div class="navigation-bar">
        <ul>
            <li>
                <a href="main.php">
                    RPS
                </a>
            </li>
            <li style="float: right;">
                <a href="../controller/logout.php">
                    Logout
                </a>
            </li>
        </ul>
    </div>

    <div id="password-change" class='changepasswordform-content'>
        <h2>
            Change Password
        </h2>
        <form method="post"  name="change_password_form" action="../controller/Change_password.php" onsubmit="return validate_change_password()">
            <label>Current password</label><input type="password" name="current_password">
            <label>Password</label><input type="password" name='password'>
            <label>Confirm password</label><input type="password" name='confirm_password'>
            <hr>
            <input type="submit" value="Change password">

        </form>
        <span id="warning">

        </span>
    </div>
</body>
</html>