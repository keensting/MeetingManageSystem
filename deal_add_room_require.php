<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/8
 * Time: 12:30
 */

include './parameter/Medoo/Resource/medoo.php';

$num=$_POST['num'];
$space=$_POST['space'];
$ppt=$_POST['ppt'];
$mic=$_POST['mic'];
$board=$_POST['board'];
$mydb=new medoo('meetingmanage');

$id=$mydb->max('rooms','ROOM_ID');

$mydb->insert('rooms',array(
    'ROOM_ID'=>$id+1,
    'NUM'=>$num,
    'SPACE'=>$space,
    'ONE1'=>0,
    'ONE2'=>0,
    'ONE3'=>0,
    'ONE4'=>0,
    'ONE5'=>0,
    'ONE6'=>0,
    'TWO1'=>0,
    'TWO2'=>0,
    'TWO3'=>0,
    'TWO4'=>0,
    'TWO5'=>0,
    'TWO6'=>0,
    'THREE1'=>0,
    'THREE2'=>0,
    'THREE3'=>0,
    'THREE4'=>0,
    'THREE5'=>0,
    'THREE6'=>0,
    'MIC'=>$mic,
    'PPT'=>$ppt,
    'BOARD'=>$board,
    'STATE'=>1
));

?>
<html>
<head>

</head>
<body style="background-color: #ffffff;">
<script>
    alert('新的会议室已添加！');
</script>
</body>
<meta http-equiv="refresh" content="1;url='./meetingroom.php'">

</html>

