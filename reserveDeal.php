<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/6
 * Time: 10:27
 */

require_once './parameter/Medoo/Resource/medoo.php';
include  ("./parameter/mysql/DataOperat.php");
session_start();
$uid=$_SESSION['uid'];


$name=$_POST["name"];
$detail=$_POST['detail'];
$room=$_POST['room'];
$chkArr=$_POST['chk'];
$date=$_POST['date'];
$time=$_POST['time'];
$offset=mktime(0,0,0,date("m"),date("d")+$date,date("Y"));
$date_time=date("Y/m/d",$offset);
$mydb=new DataOperat();
$num=$mydb->getMaxId('MEETING_ID','meeting');
$num+=1;
$db=new medoo('meetingmanage');
//meeting
$db->insert('meeting',array(
    'MEETING_ID'=>$num,
    'NAME'=>$name,
    'INSTRUCTION'=>$detail,
    'ROOM_ID'=>$room,
    'USER_ID'=>$uid,
    'DATE'=>$date_time,
    'DAY_AFTER'=>$date,
    'TIME'=>$time,
    'STATE'=>1,
    'VALIDITY'=>0

));
$time_re='';
if($time==1)
{
    $time_re='8:00';
}
elseif($time==2)
{
    $time_re="10:00";
}elseif($time==3)
{
    $time_re="13:00";
}elseif($time==4)
{
    $time_re="15:00";
}elseif($time==5)
{
    $time_re="18:00";
}elseif($time==6)
{
    $time_re="20:00";
}

//inform
$iid=$mydb->getMaxId('INFORM_ID','inform');
$iid+=1;

$content="请于".$date_time." ".$time_re."之前，前往会议室".$room."参加会议。会议内容《".$name."》";

$db->insert('inform',array(
   'INFORM_ID'=>$iid,
    'USER_ID'=>$uid,
    'DATE'=>date("Y/m/d"),
    'CONTENT'=>$content,
    'MEETING_ID'=>$num
));
//room
$index='';
if($date==1)
{
    $index='ONE'.$time;
}elseif($date==2)
{
    $index='TWO'.$time;
}
else{
    $index='THREE'.$time;
}



$db->update('rooms',array(
    $index=>1
),array(
        'NUM'=>$room
    )
    );



$nid=$mydb->getMaxId('NOTICE_ID','notice');
$nid+=1;

$aid=$mydb->getMaxId('ATT_ID','attendence');
$aid+=1;
//$chkArr[count($chkArr)]=$uid;

for($i=0;$i<count($chkArr);$i++)
{
    //user
    $db->update('user',array(
        'MES'=>$iid
    ),array(
        'USER_ID'=>$chkArr[$i]
    ));
    //notice

    $db->insert('notice',array(
        'NOTICE_ID'=>$nid+$i,
        'USER_ID'=>$chkArr[$i],
        'INFORM_ID'=>$iid,
        'STATE'=>0
    ));
    //attentence
    $db->insert('attendence',array(
       'ATT_ID'=>$aid+$i,
        'MEETING_ID'=>$num,
        'STATE'=>1,
        'PERSON_STATE'=>1,
        'USER_ID'=>$chkArr[$i]
    ));

}




?>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


</head >
<body>

<div class="container">
    <div class="page-header">
        <h3><strong>会议预定结果</strong></h3>
    </div>
    <div class="panel-body">
        <img class="img-circle" style="width: 110px;height: 110px;" src="./img/ok.png">
        <label> 会议已成功预定！即将通知参会人员！你可以在‘我的会议’中上传相关文件！</label>

    </div>

</div>

<meta http-equiv="refresh" content="2;url='./mymeeting.php'"/>

</body>

</html>