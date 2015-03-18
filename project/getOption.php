
<?php
    header("Content-type:text/html;charset=utf-8");
    $res = array();
    if($_POST["mainpic"]){
        $res[] = "http://localhost:8888/project/mainimg/guide_00.jpg";
        $res[] = "http://localhost:8888/project/mainimg/guide_01.jpg";
        $res[] = "http://localhost:8888/project/mainimg/guide_02.jpg";
    }
    print_r(json_encode($res));
?>
