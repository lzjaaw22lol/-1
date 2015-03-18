
<?php
    //    nsarray(nsdictionary(.., .., .., "usermsg":nsdictionary), nsdictionary(.....), nsdictionary(.....), .....)

    header("Content-type:text/html;charset=utf-8");
//    $_POST["msg"][0] = 26;
//    $_POST["msg"][1] = 4;
    if($_POST["msg0"])
    {
        $workerid = $_POST["msg0"];
        $taskid = $_POST["msg1"];
        $con = mysql_connect("localhost","root","123");
        mysql_query("set names utf8");
        if(mysql_select_db("myproject",$con)){
            $sql0 = "select enid from entrust where taskid=".$taskid;
            $res0 = mysql_query($sql0, $con);
            $row0 = mysql_fetch_array($res0);
            $enid = $row0["enid"];
            $sql = "update entrust set acceptid=".$workerid." where taskid=".$taskid;
            $res = mysql_query($sql, $con);
            $sql1 = "INSERT INTO schedule (scid, state, s_date) VALUES (".$enid.", 1, NOW())";
            $res1 = mysql_query($sql1, $con);
            
        }
    else{
        echo "fail";
    }
    mysql_close($con);
    }
?>
