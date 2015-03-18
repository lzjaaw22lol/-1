
<?php
    header("Content-type:text/html;charset=utf-8");
    if(!$_POST["msg"])
    $_POST["msg"] = 10;
    $con = mysql_connect("localhost","root","123");
    mysql_query("set names utf8");
    if(mysql_select_db("myproject",$con)){
        $sql = "select * from tasks,user where tasks.userid=user.userid order by taskid desc limit 0,".$_POST["msg"];
        $res = mysql_query($sql, $con);
        $result = array();
        while($row = mysql_fetch_array($res)){
            $sql1 = "select acceptid from entrust where taskid=".$row["taskid"];
            $res1 = mysql_query($sql1, $con);
            $row1 = mysql_fetch_array($res1);
            $row["acceptid"] = $row1["acceptid"];
            $result[] = $row;
        }
        print_r(json_encode($result));
    }
    else{
        echo "fail";
    }
    mysql_close($con);
    ?>
