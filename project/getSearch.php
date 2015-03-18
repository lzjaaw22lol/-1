
<?php
    header("Content-type:text/html;charset=utf-8");
//    $_POST["msg"] = "电脑";
    if($_POST["msg"]){
        $con = mysql_connect("localhost","root","123");
        mysql_query("set names utf8");
        if(mysql_select_db("myproject",$con)){
            $sql = "select * from tasks where detail like '%".$_POST["msg"]."%'";
            $res = mysql_query($sql, $con);
            $result = array();
            while($row = mysql_fetch_array($res)){
                $row1 = NULL;
                $sql1 = "select acceptid from entrust where taskid=".$row["taskid"];
                $res1 = mysql_query($sql1, $con);
                $row1 = mysql_fetch_array($res1);
                $row["acceptid"] = $row1["acceptid"];

                $sql2 = "select headpic,username from user where userid=".$row["userid"];
                $res2 = mysql_query($sql2, $con);
                $row2 = mysql_fetch_array($res2);
                $row["headpic"] = $row2["headpic"];
                $row["username"] = $row2["username"];
                $result[] = $row;
            }
            print_r(json_encode($result));
        }
        else{
            echo "fail";
        }
        mysql_close($con);
    }
?>
