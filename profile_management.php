<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password,"training_game");  
    $user=$_SESSION['useractive'];
    $sql="select username,name,email,gender,password from user_details where username='$user'";
    $out=$conn->query($sql);
    echo $conn->error;
    $name1='';
    $user1='';
    $email1='';
    $gender1='';
    $password='';
    while($row = $out->fetch_assoc()) 
    {
        $user1=$row['username'];
        $name1 =$row['name'];
        $email1=$row['email'];
        $gender1= $row['gender'];
        $password=$row['password'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    <script src="script.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function()
        {
            $("#clickme").click(function(){
                
                $('#form').removeClass('hide').addClass('show');
                $('#data').removeClass('show').addClass('hide');
                $("input[name=gender][value='<?php echo $gender1;?>']").prop('checked', true);
                $('#clickme').hide();
            })
            
        } )
    </script>
    <style>
        .hide{
            display: none;
        }
        .new-hide{
            display: none;
        }
    </style>

</head>
<body>
        <div class="navigation-bar">
            <ul>
                <li><a class="active" href="main.html">RPS</a></li>
                <li style="float:right"><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <button id="clickme"> 
                Edit Profile
        </button>
        <a href="changepassword.php">
            <button id="change_password">
                    Change Password
            </button>
        </a>
        <div class="hide" id='form'>
            <div class=form-content>
                <form name="myForm" method="post" action="updatedetails.php"  onsubmit="return validateform()">
                    <label>Name</label><br>
                    <input type="text" name="name" autocomplete="off" value='<?php echo $name1;?>'>
                    <br>
                    <label>Email</label><br>
                    <input type="text" name="email"autocomplete="off" value='<?php echo $email1;?>'>
                    <br>
                    <label>Username</label><br>
                    <input type="text" name="username"autocomplete="off" class="login__input" value="<?php echo $user1;?>" readonly>
                    <br>
                    <label>Password</label><br>
                    <input type="password" name="pwd"autocomplete="off" value='.......' readonly>
                    <br>
                    <label>Gender</label><br>
                    <br>
                    <input type="radio" name="gender" value="Male">
                    Male 
                    <input type="radio" name="gender" value="Female">
                    Female
                    <input type="radio" name="gender" value="Other"> 
                    Other
                    <hr>
                    <input type="submit" value='Edit'>
                </form>
            </div>
            <span id="warning">

            </span>
        </div>
        <div class="show" id='data'>
            <div class="arrange">
                <div style="text-align: justify; text-justify: inter-word;">
                    <h1 style="text-align=centre;"> User Profile</h1>
                    <div>
                        UserName:
                        <?php echo $user1. "<br>"?>
                    </div> 
                    <div >
                        Name:
                        <?php echo $name1;?>
                    <div  >
                        Email:
                        <?php echo $email1."<br>"?>
                    </div>
                    <div  >
                        Gender:
                        <?php echo $gender1;?>
                    </div>
                </div>
                 
            </div>
        </div>
</body>
</html>






