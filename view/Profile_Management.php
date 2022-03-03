<?php
include '../controller/profile.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../styles.css">
    <script src="../script.js"></script>
 
    <script>
        $(document).ready(function()
        {
            $("#clickme2").click(function(){
                
                $('#form').removeClass('hide').addClass('show');
                $('#data').removeClass('show').addClass('hide');
                $("input[name=gender][value='<?php echo $gender;?>']").prop('checked', true);
                $('#clickme2').hide();
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
                <li><a class="active" href="Main.php">RPS</a></li>
                <li style="float:right"><a href="../controller/Logout.php">Logout</a></li>
            </ul>
        </div>
        <button id="clickme2"> 
                Edit Profile
        </button>
        <a href="Change_Password.php">
            <button id="change_password">
                    Change Password
            </button>
        </a>
        <div class="hide" id='form'>
            <div class=form-content>
                <form name="edit_profile" method="post" action="../controller/Update_User_Details.php"  onsubmit="return validate_edit_profile()">
                    <label>Name</label><br>
                    <input type="text" name="name" autocomplete="off" value='<?php echo $name;?>'>
                    <br>
                    <label>Email</label><br>
                    <input type="text" name="email"autocomplete="off" value='<?php echo $email;?>'>
                    <br>
                    <label>Username</label><br>
                    <input type="text" name="username"autocomplete="off" class="login__input" value="<?php echo $username;?>" readonly>
                    <br>
                    <label>Password</label><br>
                    <input type="password" name="password"autocomplete="off" value='.......' readonly>
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
                <span id="warning">

                </span>
            </div>
            
        </div>
        <div class="show" id='data'>
            <div class="arrange">
                <div style="text-align: justify; text-justify: inter-word;">
                    <h1 style="text-align=centre;"> User Profile</h1>
                    <div>
                        Username:
                        <?php echo $username. "<br>"?>
                    </div> 
                    <div >
                        Name:
                        <?php echo $name;?>
                    <div  >
                        Email:
                        <?php echo $email."<br>"?>
                    </div>
                    <div  >
                        Gender:
                        <?php echo $gender;?>
                    </div>
                </div>
                 
            </div>
        </div>
</body>
</html>






