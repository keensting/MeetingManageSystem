<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/8
 * Time: 9:49
 */

require_once './parameter/Medoo/Resource/medoo.php';
$name=$_POST['name'];
$phone=$_POST['tel'];
$info=$_POST['info'];
session_start();
$id=$_SESSION['did'];

$mydb=new medoo('meetingmanage');

$mydb->update('departs',array(
    'NAME'=>$name,
    'PHONE'=>$phone,
    'INSTRUCTION'=>$info
),
    array(
        'DEPART_ID'=>$id
    ));


?>


<html>
<head>

</head>
<body style="background-color: #ffffff">
    <script type="text/javascript">
        alert("部门信息已经修改！");
    </script>

    <meta http-equiv="refresh" content="1;url='./delDepart.php'"/>
</body>

</html>