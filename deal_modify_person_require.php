<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/8
 * Time: 11:16
 */
session_start();


require_once './parameter/Medoo/Resource/medoo.php';
$name=$_POST['name'];
$id=$_SESSION['uid'];
$email=$_POST['mail'];
$phone=$_POST['tel'];
$dep=$_POST['depart'];
$position=$_POST['position'];




$mydb=new medoo('meetingmanage');
$mydb->update('user',
    array(
        'REAL_NAME'=>$name,
        'PHONE'=>$phone,
        'EMAIL'=>$email,
        'DEPART_ID'=>$dep,
        'IDENTY'=>$position
    ),
    array(
        'USER_ID'=>$id
    ));


?>



<html>


<head>

</head>
<body style="background-color: #ffffff">
        <script>
            alert('员工信息已经更改！');
        </script>
        <meta  http-equiv="refresh" content="1;url='./person.php'">
</body>
</html>