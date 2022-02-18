    <?php
    $loose=0;
    $win=0;
    $total=0;
    $tie=0;
        #echo "summary : total ".$total.' tie: '.$tie.' win: '.$win.' loose: '.$loose."<br>";
        $arr=array(1=>'Stone',2=>'Paper',3=>'Scissor');
        $user=$_REQUEST['choice'];
        $computer= rand(1,3);
        //echo "<div class='show'>";
        //echo "<h3>";
        //echo "Computer selected:    <i> ". $arr[$computer].'</i><br>';
        //echo $arr[$computer].'-';
        echo "You <i> ";
        if ($user==$computer)
            {
                echo "tie";
                $tie=$tie+1;
            }
            elseif($user=='1' && $computer==2)
            {
                echo 'loose';
                $loose=$loose+1;
            }
            elseif($user=='1'&&$computer=='3')
            {
                echo 'win';
                $win=$win+1;
            }elseif($user=='2'&&$computer=='1')
            {
                echo 'win';
                $win=$win+1;
            }
            elseif($user=='2'&&$computer=='3')
            {
                echo 'loose';
                $loose=$loose+1;
            }elseif($user=='3'&&$computer=='1')
            {
                echo "loose";
                $loose=$loose+1;
            }
            elseif($user=='3'&&$computer=='2')
            {
                echo "win";
                $win=$win+1;
            }
            $total=$total+1;
        //echo " </i>the match";
       // echo "<br> computer selected";
       echo '-';
        if ($computer=='1')
        echo " <img src='stone.jpg' width='180' height='180'>";
        if ($computer=='2')
        echo "<img src='paper.jpg' width='180' height='180'>";
        if ($computer=='3')
        echo "<img src='scissor.jpg' width='180' height='180'>";
       // echo "    You selected";
       echo "-";
        if ($user=='1')
        echo " <img src='stone.jpg'width='180' height='180'>";
        if ($user=='2')
        echo "<img src='paper.jpg' width='180' height='180'>";
        if ($user=='3')
        echo "<img src='scissor.jpg' width='180' height='180'>";
        //echo "</h3>";
        //}
        $servername = "localhost";
        $username = "root";
        $password = "";
        // Create connection with mysql server
        $conn = new mysqli($servername, $username, $password,"mydb");  
        $user=$_REQUEST['username'];
        //echo $user."<br>";
        $sql="select username,name,email,gender from mytable where username=".$_session[$user];
        //echo $sql;
        $out=$conn->query($sql);
        $sql = "UPDATE mytable SET win=".'Doe' WHERE id=2";
        ?>