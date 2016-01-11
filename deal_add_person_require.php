<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/8
 * Time: 11:53
 */
require_once './parameter/Medoo/Resource/medoo.php';

$name=$_POST['name'];
$sex=$_POST['sex'];
$dep=$_POST['depart'];
$pos=$_POST['position'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];


$mydb=new medoo('meetingmanage');
$id=$mydb->max('user','USER_ID');
$mydb->insert('user',array(
    'USER_ID'=>$id+1,
    'EMAIL'=>$mail,
    'PHONE'=>$tel,
    'NAME'=>$tel,
    'REAL_NAME'=>$name,
    'PWD'=>$tel,
    'IDENTY'=>$pos,
    'HEAD_IMG'=>'./assert/user/headimg/4.jpg',
    'SEX'=>$sex,
    'DEPART_ID'=>$dep,
    'STATE'=>1,
    'MES'=>0



));



?>
<html>
<head>

</head>
    <body>
        <script>
            alert('员工信息已添加，手机号即为登录账号和密码！');
        </script>
    </body>
    <meta http-equiv="refresh" content="1;url='./addperson.php'">

</html>

