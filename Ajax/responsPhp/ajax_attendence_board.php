<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/1
 * Time: 12:08
 */
require_once '../../parameter/Medoo/Resource/medoo.php';
require_once '../../parameter/class/attendence.php';


/*
    * 从参会列表中获取某一特定会议的参与者信息
    */

$id=$_POST['id'];
function  fetch_attendence($id)
{
    $mydb=new medoo("meetingmanage");

    $re= $mydb->select('attendence',
        array(
            "[>]user"=>array("USER_ID"=>"USER_ID")
        ),
        array(
            "attendence.PERSON_STATE",
            "user.REAL_NAME"
        ),
        array("attendence.MEETING_ID"=>$id)
    );

    return $re;

}



$re=fetch_attendence($id);


$num=count($re);
$arr=array();
for($i=0;$i<$num;$i++)
{
    $arr[$i]=$re[$i];

}
echo json_encode($arr);



?>