
<?php
    header("Content-type:text/html;charset=utf-8");
    if($_POST["msg"]){
        $msgarr = json_decode($_POST["msg"]);
        $sql = "INSERT INTO user (userid, username, pwd, userinfo, userwhich, u_phone, headpic, u_date) VALUES (NULL, '".$msgarr->username."', '".$msgarr->pwd."', '".$msgarr->userinfo."', '".$msgarr->userinfo."', '".$msgarr->u_phone."', '".$msgarr->headpic."', NOW())";
//        $sql1 = "INSERT INTO user (userid, username, pwd, userinfo, userwhich, u_phone, headpic, u_date) VALUES (NULL, 'tt', '1', '1', '1', '1', '1', NOW())";
        $con = mysql_connect("localhost","root","123");
        mysql_query("set names utf8");
        if(mysql_select_db("myproject",$con)){
            if(mysql_query($sql, $con)){
                $sqlCount = "select userid from user where username='".$msgarr->username."' and pwd='".$msgarr->pwd."'";
                $ucres = mysql_query($sqlCount, $con);
                while($usercount = mysql_fetch_array($ucres)){
                    echo $usercount[0];
                    break;
                }
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
