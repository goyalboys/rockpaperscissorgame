<?php


      include 'Training_Game_Database.php';
?>

<?php
       function check_user_exist($username)
       {
            $conn = new mysqli($GLOBALS['servername'], $GLOBALS['root_user'], $GLOBALS['root_password'],"training_game"); 
            try{

                $sql="select * from user_details where username ='$username'";
                $out=$conn->query($sql);
                echo $conn->error;
                $output=array();
                while($row = $out->fetch_assoc()) 
                    $output=$row["username"];
                if(empty($output))
                    return 0;
                else
                    return 1;
            }
            finally{
                $conn->close();
            }
            
        }

            
        function insert_data($name,$username,$email,$password,$gender)
        {
            $conn = new mysqli($GLOBALS['servername'], $GLOBALS['root_user'], $GLOBALS['root_password'],"training_game"); 

            try{
                $sql="start Transaction";
                $conn->query($sql);
                $sql="INSERT INTO user_details (name,username,email,password,gender)VALUES('$name','$username','$email','$password','$gender')";
                $conn->query($sql);
                echo $conn->error;
                $sql="INSERT INTO rps_scoreboard (username)VALUE('$username')";
                $conn->query($sql);
                $sql="commit";
                $conn->query($sql);
                echo $conn->error;
            }
           finally{
            $conn->close();
           }
           
        }


        function check_user_password($username,$pasword)
        {
            $conn = new mysqli($GLOBALS['servername'], $GLOBALS['root_user'], $GLOBALS['root_password'],"training_game");  
            try{
                $sql="select password from user_details where username='$username'";
                $result= $conn->query($sql);
                echo $conn->error;
                $output='';

                while($row = $result->fetch_assoc()) 
                    $output=$row["password"];
                
                return password_verify($pasword, $output);
            }
            finally{
                $conn->close();
            }
        }


        function update_user_status($username,$timestamp)
        {
            $conn = new mysqli($GLOBALS['servername'], $GLOBALS['root_user'], $GLOBALS['root_password'],"training_game");
            try{
                $sql = "UPDATE user_details SET active='$timestamp' WHERE username='$username'";
                $conn->query($sql);
                echo $conn->error;
            }
            finally{
                $conn->close();
            }
        }

        function get_all_username(){
            $conn = new mysqli($GLOBALS['servername'], $GLOBALS['root_user'], $GLOBALS['root_password'],"training_game"); 
            try{
                $sql="select username,active from user_details ";
                $result=$conn->query($sql);
                echo $conn->error;
                return $result;
            }
            finally{
                $conn->close();
            }
        }


        function clicked_user_detail($user)
        {
            $conn = new mysqli($GLOBALS['servername'], $GLOBALS['root_user'], $GLOBALS['root_password'],"training_game");
            try{

                $sql="select username,name,email,gender from user_details where username=".$user;
                $out=$conn->query($sql);
                echo $conn->error;
                if ($out->num_rows==0)
                {
                    throw new Exception("user is not present");
                }
                $a=array();
                //if user is not there
                while($row = $out->fetch_assoc()) 
                {
                    $user1=$row['username'];
                    $name1 =$row['name'];
                    $email1=$row['email'];
                    $gender1= $row['gender'];

                    array_push($a,$user1,$name1,$email1,$gender1);
                }
                return $a;
            }
            catch(Exception $e)
            {
                //echo $e;
                return 0;
            }
            finally{
                $conn->close();
            }
            
        }

        
        function profile_detail($user)
        {
            $conn = new mysqli($GLOBALS['servername'], $GLOBALS['root_user'], $GLOBALS['root_password'],"training_game");
            try{
                $sql="select username,name,email,gender,password from user_details where username='$user'";
                $out=$conn->query($sql);
                echo $conn->error;
                return $out;
            }
            finally{
                $conn->close();
            }
        }


        function update_details($username,$email,$gender,$name)
        {
            $conn = new mysqli($GLOBALS['servername'], $GLOBALS['root_user'], $GLOBALS['root_password'],"training_game"); 
            try{
                $sql="UPDATE user_details SET name='$name',email='$email',gender='$gender' WHERE username = '$username'" ;
                $conn->query($sql);
                echo $conn->error;
            }
            finally{
                $conn->close();
            }
           
        }


        function update_password($user,$password,$timestamp)
        {
            $conn = new mysqli($GLOBALS['servername'], $GLOBALS['root_user'], $GLOBALS['root_password'],"training_game");
            try{
                $sql = "UPDATE user_details SET active='$timestamp', password='$password' WHERE username='$user'";
                $conn->query($sql);
                echo $conn->error;
            }
            finally{
                $conn->close();
            }
        }
?>