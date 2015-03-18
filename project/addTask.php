
<?php
    header("Content-type:text/html;charset=utf-8");
    function addToEntrust($listid, $pid, $con){
        $sqlen = "INSERT INTO entrust (enid, pulishid, acceptid, taskid) VALUES (NULL, ".$pid.", 0, ".$listid.")";
        mysql_query($sqlen, $con);
        $enid = mysql_insert_id();
        $sqlsc = "INSERT INTO schedule (scid, state, s_date) VALUES (".$enid.", 0, NOW())";
        mysql_query($sqlsc, $con);
    }
    if($_POST["msg"]){
        $msgarr = json_decode($_POST["msg"]);
        $sql = "INSERT INTO tasks (taskid, userid, type, money, t_phone, detail, voiceaddr, picaddr, t_date, tendercount) VALUES (NULL, ".$msgarr->userid.", '".$msgarr->type."', ".$msgarr->money.", '".$msgarr->t_phone."', '".$msgarr->detail."', '".$msgarr->voiceaddr."', '".$msgarr->picaddr."', NOW(), 0)";
        $con = mysql_connect("localhost","root","123");
        mysql_query("set names utf8");
        if(mysql_select_db("myproject",$con)){
            if(mysql_query($sql, $con)){
                echo "1";
                $listid = mysql_insert_id();
                addToEntrust($listid, $msgarr->userid, $con);
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
