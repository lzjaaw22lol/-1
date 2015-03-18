
<?php
    //    nsarray(nsdictionary(.., .., .., "usermsg":nsdictionary), nsdictionary(.....), nsdictionary(.....), .....)

    header("Content-type:text/html;charset=utf-8");
//    $_POST["msg"] = 5;
    if($_POST["msg"])
    {
    $con = mysql_connect("localhost","root","123");
    mysql_query("set names utf8");
    if(mysql_select_db("myproject",$con)){
        $sql = "select * from tender where ten_taskid=".$_POST["msg"];
        $res = mysql_query($sql, $con);
        $result = array();
        while($row = mysql_fetch_array($res)){
            $sql1 = "select userid,username,userinfo,userwhich,u_phone,headpic from user where userid=".$row["ten_userid"];
            $res1 = mysql_query($sql1, $con);
            $row1 = mysql_fetch_array($res1);
            $row["usermsg"] = $row1;
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
