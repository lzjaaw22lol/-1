
<?php
    header("Content-type:text/html;charset=utf-8");

    if($_POST["msg"] && $_POST["msg1"])
    {
    $con = mysql_connect("localhost","root","123");
    mysql_query("set names utf8");
    if(mysql_select_db("myproject",$con)){
        $sql = "update user set headpic='".$_POST["msg"]."' where username='".$_POST["msg1"]."'";
        $res = mysql_query($sql, $con);
        if($res){
            echo "1";
        }
        else
            echo "0";
    }
    else{
        echo "fail";
    }
    mysql_close($con);
    }
    else
    {
        
        if ($_FILES["upfile"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["upfile"]["error"] . "<br />";
        }
        else
        {
            echo "Upload: " . $_FILES["upfile"]["name"] . "<br />";
            echo "Type: " . $_FILES["upfile"]["type"] . "<br />";
            echo "Size: " . ($_FILES["upfile"]["size"] / 1024) . " Kb<br />";
            echo "Temp file: " . $_FILES["upfile"]["tmp_name"] . "<br />";
            
            if (file_exists("upload/" . $_FILES["upfile"]["name"]))
            {
                echo $_FILES["upfile"]["name"] . " already exists. ";
            }
            else
            {
                move_uploaded_file($_FILES["upfile"]["tmp_name"],
                                   "upload/".$_FILES["upfile"]["name"].".png");
                echo "Stored in: " . "upload/" . $_FILES["upfile"]["name"];
            }
        }
    }
?>
