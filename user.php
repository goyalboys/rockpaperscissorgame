<?php
$sql="select username from mytable ";
$servername = "localhost";
        $username = "root";
        $password = "";
    //echo $_REQUEST['1'];
        // Create connection with mysql server
        $conn = new mysqli($servername, $username, $password,"mydb");  
        $result=$conn->query($sql);
        $output=array();
       // echo "<ul>";
      // $i=0;
      $str="";
        while($row = $result->fetch_assoc()) 
            {
                //echo "<li>";
                $str.="<div style='color:white;'><a href=".'userdetail.php?username='."'".$row['username']."'"."  style='color: white;text-align: center;text-decoration: none;'> 🔴".$row["username"]."</a></div>"."<br>";
               // array_push($output,$row["username"]);
                //echo $output;
                //echo "</li>";
                //$i=$i+1;
                //echo "New record created successfully. Last inserted ID is: " . $result;
            }
           // echo "</ul>";
        //echo json_encode($output);
        echo $str;
        //echo $output;
?>
