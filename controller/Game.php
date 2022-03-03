<?php
    session_start();

    include '../model/User_Details_Table.php';
    include '../model/Rps_Scoreboard_table.php';

    

    if(!empty($_SESSION['user_active']))
    {
        $tie=0;
        $loose=0;
        $win=0;
        $total=0;
        $username= $_SESSION['user_active'];
        $arr=array(1=>'Stone',2=>'Paper',3=>'Scissor');
        $user_choice=$_REQUEST['choice'];
        //$user=3;
        $computer_choice= rand(1,3);
        echo "You <i> ";
        if ($user_choice==$computer_choice)
            {
                echo "tie";
                $tie=1;
            }
            elseif($user_choice=='1' && $computer_choice=='2')
            {
                echo 'loose';
                $loose=1;
            }
            elseif($user_choice=='1'&&$computer_choice=='3')
            {
                echo 'win';
                $win=1;
            }elseif($user_choice=='2'&&$computer_choice=='1')
            {
                echo 'win';
                $win=1;
            }
            elseif($user_choice=='2'&&$computer_choice=='3')
            {
                echo 'loose';
                $loose=1;
            }elseif($user_choice=='3'&&$computer_choice=='1')
            {
                echo "loose";
                $loose=1;
            }
            elseif($user_choice=='3'&&$computer_choice=='2')
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
        if ($computer_choice=='1')
            echo " <img src='../images/stone.jpg' width='180' height='180'>";
        if ($computer_choice=='2')
            echo "<img src='../images/paper.jpg' width='180' height='180'>";
        if ($computer_choice=='3')
            echo "<img src='../images/scissor.jpg' width='180' height='180'>";

        echo "-";

        if ($user_choice=='1')
            echo " <img src='../images/stone.jpg'width='180' height='180'>";
        if ($user_choice=='2')
            echo "<img src='../images/paper.jpg' width='180' height='180'>";
        if ($user_choice=='3')
            echo "<img src='../images/scissor.jpg' width='180' height='180'>";
    
        echo "-";

        update_game_score($loose,$win,$total,$tie,$username);
        echo $_SESSION['total'].'-'. $_SESSION['tie'].'-'. $_SESSION['win'].'-'.$_SESSION['loose'];
    }
    else
    {
        echo "-1";
    }  



?>