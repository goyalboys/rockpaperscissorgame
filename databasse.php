    <?php

      include_once 'databaseinitialisation.php';

        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new mysqli($servername, $username, $password,"training_game");          
        if ($_SERVER['REQUEST_METHOD']=='POST')
        {
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
                $sql="INSERT INTO rockpaperscissordashboard (username)VALUE('$u')";
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
    ?>