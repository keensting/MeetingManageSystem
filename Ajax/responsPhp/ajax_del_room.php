<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/8
 * Time: 13:11
 */
include '../../parameter/Medoo/Resource/medoo.php';

$id=$_POST['id'];
$mydb=new medoo('meetingmanage');
$mydb->delete('rooms',array(
    'ROOM_ID'=>$id
));
?>