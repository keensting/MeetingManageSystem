<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/8
 * Time: 10:41
 */
require_once './parameter/Medoo/Resource/medoo.php';

$id=$_GET['id'];

$mydb=new medoo('meetingmanage');

$mydb->update('user',array(
    'STATE'=>0
),
    array(
        'USER_ID'=>$id
    ))


?>
<html>
<head>

</head>
<body style="background-color: #ffffff">
    <script>
        alert('该员工信息已经删除！');
    </script>
    <meta http-equiv="refresh" content="1;url='./person.php'">
</body>

</html>