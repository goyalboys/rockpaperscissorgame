<?php
    session_start();
    
    
    if(!empty($_SESSION['useractive']))
    {

        $tie=0;
        $loose=0;
        $win=0;
        $total=0;
        $usern= $_SESSION['useractive'];
        $arr=array(1=>'Stone',2=>'Paper',3=>'Scissor');
        $user=$_REQUEST['choice'];
        $computer= rand(1,3);
        echo "You <i> ";
        if ($user==$computer)
            {
                echo "tie";
                $tie=1;
            }
            elseif($user=='1' && $computer=='2')
            {
                echo 'loose';
                $loose=1;
            }
            elseif($user=='1'&&$computer=='3')
            {
                echo 'win';
                $win=1;
            }elseif($user=='2'&&$computer=='1')
            {
                echo 'win';
                $win=1;
            }
            elseif($user=='2'&&$computer=='3')
            {
                echo 'loose';
                $loose=1;
            }elseif($user=='3'&&$computer=='1')
            {
                echo "loose";
                $loose=1;
            }
            elseif($user=='3'&&$computer=='2')
            {
                echo "win";
                $win=1;
            }
        $total=1;
        $_SESSION['loose']=$_SESSION['loose']+$loose;
        $_SESSION['win']=$_SESSION['win']+$win;
        $_SESSION['total']=$_SESSION['total']+$total;
        $_SESSION['tie']=$_SESSION['tie']+$tie;
        echo '-';
        if ($computer=='1')
            echo " <img src='images/stone.jpg' width='180' height='180'>";
        if ($computer=='2')
            echo "<img src='images/paper.jpg' width='180' height='180'>";
        if ($computer=='3')
            echo "<img src='images/scissor.jpg' width='180' height='180'>";

        echo "-";

        if ($user=='1')
            echo " <img src='images/stone.jpg'width='180' height='180'>";
        if ($user=='2')
            echo "<img src='images/paper.jpg' width='180' height='180'>";
        if ($user=='3')
            echo "<img src='images/scissor.jpg' width='180' height='180'>";
    
        echo "-";

        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new mysqli($servername, $username, $password,"training_game");  
        echo $_SESSION['total'].'-'. $_SESSION['tie'].'-'. $_SESSION['win'].'-'.$_SESSION['loose'];
        $sql="select total,win,loose,tie from rockpaperscissordashboard where username='$usern'";
        $out=$conn->query($sql);
        var_dump($out);
        echo $conn->error;
        date_default_timezone_set('Asia/Calcutta'); 
        $timestamp = date('Y-m-d H:i:s');
        while($row = $out->fetch_assoc()) 
        {
            echo $row["win"]."<br> hello";
            $wino=$row["win"];
            $totalo=$row["total"];
            $tieo=$row['tie'];
            $looseo=$row['loose'];
            $wino+=$win;
            $totalo+=$total;
            $tieo+=$tie;
            $looseo+=$loose;
            $sql = "UPDATE rockpaperscissordashboard SET win='$wino', total='$totalo',loose='$looseo',tie='$tieo' WHERE username='$usern'";
            $conn->query($sql);
            $sql = "UPDATE user_details SET active='$timestamp' WHERE username='$usern'";
            $conn->query($sql);
            echo $conn->error;   
        }
    }
    else{
        header('Location: login.html');
        exit();
    }  
?>