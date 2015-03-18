
<?php
    header("Content-type:text/html;charset=utf-8");
//    $_POST["msg"] = 28;
    if($_POST["msg"])
    {
    $con = mysql_connect("localhost","root","123");
    mysql_query("set names utf8");
    if(mysql_select_db("myproject",$con)){
        $sql = "select enid from entrust where taskid=".$_POST["msg"];
        $res = mysql_query($sql, $con);
        $row = mysql_fetch_array($res);
        $enid = $row["enid"];
        
        $sql1 = "INSERT INTO schedule (scid, state, s_date) VALUES (".$enid.", ".$_POST["msg1"].", NOW())";
        $res1 = mysql_query($sql1, $con);
        $result[] = date("Y-m-d h:i:s",time());
        print_r(json_encode($result));
    }
    else{
        echo "fail";
    }
    mysql_close($con);
    }
?>
