<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/1
 * Time: 16:22
 */

//todo,改变meting表中会议状态validity
// todo,inform 中增加一项
//todo，1,attendence中检索meeting id，2,对应状态state设置为0 无效，3,对应user id写成新的notice，4,并将user表中的mes改为当前inform_id

$mid=$_POST['id'];
session_start();
$id=$_SESSION['uid'];

include '../../parameter/Medoo/Resource/medoo.php';

//meeting

$db=new medoo('meetingmanage');

$db->update('meeting',array(
    'VALIDITY'=>1
),array(
        'MEETING_ID'=>$mid
    )
);
//
////inform

$re=$db->select('inform','CONTENT',array(
    'MEETING_ID'=>40002
));
$content=$re[0];

$new_mes="注意：关于【".$content."】的会议已经取消，请您确认信息！";
$iid=$db->max('inform','INFORM_ID');
$iid+=1;
$date=date("Y/m/d");
$db->insert("inform",array(
    'INFORM_ID'=>$iid,
    'USER_ID'=>$id,
    'DATE'=>$date,
    'CONTENT'=>$new_mes,
    'MEETING_ID'=>$mid
));
//attendence

//获得user列表
$users=$db->select('attendence','USER_ID',array(
    'MEETING_ID'=>40000
));

//跟新参会状态
$db->update('attendence',array(
    'STATE'=>0
),
    array(
        'MEETING_ID'=>$mid
    ));

//notice & user
$num=count($users);
$nid=$db->max('notice','NOTICE_ID');
$nid+=1;
for($i=0;$i<$num;$i++)
{
    $db->insert('notice',array(
        'NOTICE_ID'=>$nid,
        'USER_ID'=>$users[$i],
        'INFORM_ID'=>$iid,
        'STATE'=>0
    ));

    $db->update('user',array(
        'MES'=>$iid
    ),array(

        'USER_ID'=>$users[$i]
    ));

}



?>