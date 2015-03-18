
<?php
    header("Content-type:text/html;charset=utf-8");
    if(!$_POST["start"])
        $_POST["start"] = 0;
//    $thetype = iconv("utf-8","gb2312",$_POST["typename"]);
//    $thetype1 = '\U5b9a\U5236\U5934\U50cf';
    $con = mysql_connect("localhost","root","123");
    mysql_query("set names utf8");
    if(mysql_select_db("myproject",$con)){
        $sql = "select * from tasks,user where tasks.userid=user.userid and type='".$_POST["typename"]."' limit ". $_POST["start"] .",5";
        $res = mysql_query($sql, $con);
        $result = array();
        while($row = mysql_fetch_array($res)){
            $row1 = NULL;
            $sql1 = "select * from entrust where taskid=".$row["taskid"];
            $res1 = mysql_query($sql1, $con);
            $row1 = mysql_fetch_array($res1);
            $resmerge = array_merge($row, $row1);
            $result[] = $resmerge;
        }
        print_r(json_encode($result));
    }
    else{
        echo "fail";
    }
    mysql_close($con);
?>
