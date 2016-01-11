<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <?php

    include  ("./parameter/Medoo/Resource/medoo.php");
    session_start();
    $id=$_SESSION['uid'];
    $name=$_SESSION['name'];
    $rname=$_SESSION['rname'];
    $email=$_SESSION['email'];
    $phone=$_SESSION['phone'];
    $depart=$_SESSION['depart'];
    $identy=$_SESSION['identy'];
    $img=$_SESSION['img'];

    $db=new medoo("meetingmanage");
    $re=$db->select("departs","NAME",array(
        "DEPART_ID"=>$depart
    ));

    $de=$re[0];



    ?>

</head>

<body>
<div class="container">
    <div class="page-header">
        <h3><strong>我的信息</strong></h3>
    </div>

<table class="table" >
   <caption>我的信息</caption>
    <tr>
        <td>头像：</td>
        <td><img class="img-circle"  style="width: 100px;height: 100px" src="<?php echo $img; ?>"></td>
    </tr>
    <tr>
        <td>姓名：</td>
        <td><?php echo $name; ?></td>
    </tr>
    <tr>
        <td>昵称：</td>
        <td><?php echo $rname; ?></td>
    </tr>
    <tr>
        <td>邮箱：</td>
        <td><?php echo $email; ?></td>

    </tr>
    <tr>
        <td>手机：</td>
        <td><?php echo $phone; ?></td>
    </tr>
    <tr>
        <td>部门：</td>
        <td><?php echo $de; ?></td>
    </tr>
    <tr>
        <td>职位：</td>
        <td><?php
        if($identy==1)
        {
            echo "助理";
        }
            elseif($identy==2){
                echo "经理";
            }
            elseif($identy==3){
                echo "副经理";
            }
            else{
                echo "员工";
            }

            ?></td>
    </tr>
</table>
    <div class="form-group">

        <button type="button" class="btn btn-primary" onclick="document.location.href='./myspace.php'">确定</button>


    </div>
</div>
</body>
</html>