
<?php
    header("Content-type:text/html;charset=utf-8");
//    $_POST["msg0"] = 1;
//    $_POST["msg1"] = 5;
//    $_POST["msg2"] = "我要投5";
    if($_POST["msg0"]){
        $sql = "INSERT INTO tender (ten_userid, ten_taskid, ten_date, say) VALUES (".$_POST["msg0"].", ".$_POST["msg1"].", NOW(), '".$_POST["msg2"]."')";
        $con = mysql_connect("localhost","root","123");
        mysql_query("set names utf8");
        if(mysql_select_db("myproject",$con)){
            if(mysql_query($sql, $con)){
                $sql1 = "select tendercount from tasks where taskid=".$_POST["msg1"];
                $res1 = mysql_query($sql1, $con);
                $row1 = mysql_fetch_array($res1);
                $tc = $row["tendercount"];
                $tc++;
                $sql2 = "update tasks set tendercount=".$tc." where taskid=".$_POST["msg1"];
                $res2 = mysql_query($sql2, $con);
                if($res2)
                    echo "1";
            }
            else
                echo "0";
        }
        else
        {
            echo "0";
        }
    }
    else{
        echo "0";
    }
    mysql_close($con);
?>
