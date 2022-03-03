
<?php

function update_game_score($loose,$win,$total,$tie,$usern)
{
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['root_user'], $GLOBALS['root_password'],"training_game"); 
   try{
        $sql="select total,win,loose,tie from rps_scoreboard where username='$usern'";
        $out=$conn->query($sql);
        echo $conn->error;
        date_default_timezone_set('Asia/Calcutta'); 
        $timestamp = date('Y-m-d H:i:s');
        while($row = $out->fetch_assoc()) 
        {
            $wino=$row["win"];
            $totalo=$row["total"];
            $tieo=$row['tie'];
            $looseo=$row['loose'];
            $wino+=$win;
            $totalo+=$total;
            $tieo+=$tie;
            $looseo+=$loose;
                $sql = "UPDATE rps_scoreboard SET win='$wino', total='$totalo',loose='$looseo',tie='$tieo' WHERE username='$usern'";
                $conn->query($sql);
                echo $conn->error;
                
                $sql = "UPDATE user_details SET active='$timestamp' WHERE username='$usern'";
                $conn->query($sql);
                echo $conn->error;
                
            
        }
    }
    finally{
        $conn->close();
    }
    

    
}

function score_user($user){
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['root_user'], $GLOBALS['root_password'],"training_game"); 
    try{
        $sql="select  loose,win,tie,total from rps_scoreboard where username=".$user;
        $out=$conn->query($sql);
        echo $conn->error;
        $a=array();
        while($row = $out->fetch_assoc()) 
            {
                $loose1=$row['loose'];
                $win1=$row['win'];
                $total1=$row['total'];
                $tie1=$row['tie'];
                array_push($a,$loose1,$win1,$total1,$tie1);
            }
            return $a;
    }
    finally{
        $conn->close();
    }
    

}