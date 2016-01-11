<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/1
 * Time: 16:41
 */

include '../../parameter/Medoo/Resource/medoo.php';

//改变meeting的状态，


$id=$_POST['id'];
$db=new medoo("meetingmanage");



$db->update("meeting",array(
    "STATE"=>0,

),
    array(
        "MEETING_ID"=>$id
    ));
//改变attendentce的状态
$db->update("attendence",array(
    "STATE"=>0
),array(
    "MEETING_ID"=>$id
));
?>