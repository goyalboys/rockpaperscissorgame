<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../mages/rps.jpg">
    <title>Login</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="../script.js"></script>
</head>
<body>
    <div class="navigation-bar">
        <ul>
            <li>
                <a class="active" href="Login.php">
                    RPS
                </a>
            </li>
            <li style="float:right">
                <a href="Index.php">
                    Register
                </a>
            </li>
        </ul>
    </div>
    <img src="../images/rpslog.jpg" height='800px' width='100%' style="position: relative;" id="image-register"">
    <div class="form-content"> 
            <h2 id="page"> 
                Login
            </h2>
            <form name="login_form" method="post"  onsubmit="return validateform_login()" action='../controller/Verify_User.php'>
                <label>
                    Username:
                </label>
                <input type="text" name="username"  placeholder="Enter username">
                <br>
                <label>
                    Password:
                </label>
                <input type="password" name="password" placeholder="Enter password">
                <br>
                <br>
                <input type="submit">
                    <h3>
                        <input type="checkbox"  name="remember">
                        Remember me
                    </h3>
                <br>
                <span id="warning">

                </span>
            </form>  
    </div>
</body>
</html>