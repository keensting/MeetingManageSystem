<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/8
 * Time: 12:51
 */
require_once './parameter/Medoo/Resource/medoo.php';
session_start();
$rid=$_SESSION['rid'];
$num=$_POST['num'];
$space=$_POST['space'];
$mic=$_POST['mic'];
$ppt=$_POST['ppt'];
$board=$_POST['board'];
$state=$_POST['state'];


$mydb=new medoo('meetingmanage');

$mydb->update('rooms',
    array(
        'NUM'=>$num,
        'SPACE'=>$space,
        'MIC'=>$mic,
        'PPT'=>$ppt,
        'BOARD'=>$board,
        'STATE'=>$state
    ),array(
        'ROOM_ID'=>$rid
    )

)

?>

<html>
<head>

</head>
<body style="background-color: #ffffff">
<script>
    alert('该部门信息已修改完成！');
</script>
<meta http-equiv="refresh" content="1;url='./meetingroom.php'">
</body>

</html>