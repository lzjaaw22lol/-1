
<?php
    header("Content-type:text/html;charset=utf-8");
//    $_POST["msg"] = "C";
//    $_POST["msg1"] = "c";
    if($_POST["msg"])
    {
        $con = mysql_connect("localhost","root","123");
        mysql_query("set names utf8");
        if(mysql_select_db("myproject",$con)){
            $sql = "select * from user where username='".$_POST["msg"]."'";
            $res = mysql_query($sql, $con);
            $result = array();
            $row = mysql_fetch_array($res);
            if($row){
                if($row["pwd"] == $_POST["msg1"])
                {
                    $result[] = "1";
                    $result[] = $row;
                }
                else
                {
                    $result[] = "0";
                }
            }
            print_r(json_encode($result));
        }
        else{
            echo "fail";
        }
        mysql_close($con);
    }
    ?>
