<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/6/29
 * Time: 15:10
 */
    include  ("./parameter/mysql/DataOperat.php");

    session_start();
    $uid=$_SESSION['uid'];
    $nid=$_GET['nid'];

    $db=new DataOperat();
    $db->alter_single_item("notice",array(
        "STATE"=>1
    ),array(
        "NOTICE_ID"=>$nid
    ));
    $db->alter_board($nid,$uid);




?>
</head>

<body>
    <div class="container">
        <div class="page-header">
            <h3><strong>确认通知</strong></h3>
        </div>
            <div class="panel-body">
                <img class="img-circle" style="width: 110px;height: 110px;" src="./img/ok.png">
                <label> 通知已确认！即将返回！</label>

            </div>

    </div>

    <meta http-equiv="refresh" content="2;url='./conferenceinform.php'"/>



</body>
</html>