
<?php
//    nsarray(nsdictionary(.., .., .., "taskmsg":nsdictionary, "entrustmsg":dictionary), nsdictionary(.....), nsdictionary(.....), .....)
    header("Content-type:text/html;charset=utf-8");
    if($_POST["msg"])
    {
        $resall = array();
        $con = mysql_connect("localhost","root","123");
        mysql_query("set names utf8");
        if(mysql_select_db("myproject",$con)){
            $sql = "select * from entrust where acceptid=".$_POST["msg"];
            $res = mysql_query($sql, $con);
            $result = array();
            while($row = mysql_fetch_array($res)){
                
                $sql1 = "select * from tasks where taskid=".$row["taskid"];
                $res1 = mysql_query($sql1, $con);
                $row1 = mysql_fetch_array($res1);
                $row["taskmsg"] = $row1;
                
                $sql2 = "select userid,username,userinfo,u_phone,headpic from user where userid=".$row["pulishid"];
                $res2 = mysql_query($sql2, $con);
                $row2 = mysql_fetch_array($res2);
                $row["entrustmsg"] = $row2;
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
