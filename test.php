<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/7
 * Time: 12:26
 */



include './parameter/Medoo/Resource/medoo.php';

$db=new medoo('meetingmanage');
$index="ONE1";
$db->update('rooms',array(
    $index=>3
),array(
        'ROOM_ID'=>20002
    )
    )

?>