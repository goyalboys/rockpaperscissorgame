    <?php

      include_once 'databaseinitialisation.php';

        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new mysqli($servername, $username, $password,"training_game");          
        if ($_SERVER['REQUEST_METHOD']=='POST')
        {
            

            $flag=0;

            if(htmlspecialchars($_REQUEST['pwd']!=htmlspecialchars($_REQUEST['cnfrpwd'])))
            {
              $flag=1;
              echo "alert :  password is not match";
            }

            if(htmlspecialchars($_REQUEST['pwd']==""||htmlspecialchars($_REQUEST['cnfrpwd']=="")))
            {
              echo "alert :  password is not entered inside the field";
              $flag=1;
            }
            $mailformat = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
            $mediumPassword = '((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))';

            if(!preg_match($mailformat,htmlspecialchars($_REQUEST['email'])))
            {
               echo "alert email is not valid";
               $flag=1;
            }

            if(!preg_match($mailformat,htmlspecialchars($_REQUEST['email'])))
            {
              echo "alert password is not strong";
                $flag=1;
            }

            if (htmlspecialchars($_REQUEST['gender'])=="")
            {
              echo "alert :  gender is not entered inside the field";
              $flag=1;
            }

            if (htmlspecialchars($_REQUEST['username'])=="")
            {
              echo "alert :  username is not entered inside the field";
              
              $flag=1;
            }
            

            if (htmlspecialchars($_REQUEST['name'])=="")
            {
              echo "alert :  Name is not entered inside the field";
              $flag=1;
            }
            if($flag==1)
            { 
              exit();
              header('Location: index.html');
            }
         



            $usr= htmlspecialchars($_REQUEST['username']);
            $sql="select * from user_details where username ='$usr'";
            $out=$conn->query($sql);
            $output=array();
            while($row = $out->fetch_assoc()) 
                $output=$row["username"];
            if(empty($output))
            {
                $hashed_password = password_hash(htmlspecialchars($_REQUEST['pwd']), PASSWORD_DEFAULT);
                $sql="INSERT INTO user_details (name,username,email,password,gender)VALUES(".'"'.htmlspecialchars($_REQUEST['name']).'"'.','.'"'.htmlspecialchars($_REQUEST['username']).'"'. 
                  ',"'.htmlspecialchars($_REQUEST['email']).'"'.','.'"'.htmlspecialchars($hashed_password).'"'. ',"'.htmlspecialchars($_REQUEST['gender']).'"'.")";
                $conn->query($sql);
                $u=htmlspecialchars($_REQUEST['username']);
                $sql="INSERT INTO rps_scoreboard (username)VALUE('$u')";
                $conn->query($sql);
                echo $conn->error;
                header('Location: login.html');
                exit;
            }
            else
            {
              echo $conn->error;
              echo "alert :  username is already exit";
            }
        }
        else{
          header("location:login.html");
        }
    ?>