


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>changepassword</title>
    <script>
        function validate_password(){
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
                <a href="main.html">
                    RPS
                </a>
            </li>
            <li style="float: right;">
                <a href="login.html">
                    Login
                </a>
            </li>
        </ul>
    </div>

<div id="password-change" class='changepasswordform-content'>
        <h2>Change Password</h2>
                <form method="post" action="changepassworddatabase.php" name="myform" onsubmit="return validate_password()">
                    <label>Current password</label><input type="password" name="curr_pwd">
                    <label>Password</label><input type="password" name='pwd'>
                    <label>Confirm password</label><input type="password" name='cnfrpwd'>
                    <hr>
                    <input type="submit" value="Change password">
                </form>
        </div>
</body>
</html>