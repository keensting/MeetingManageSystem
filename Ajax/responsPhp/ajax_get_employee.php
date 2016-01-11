<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/6
 * Time: 10:06
 */
include ("../../parameter/Medoo/Resource/medoo.php");

$db=new medoo("meetingmanage");

$re=$db->select('user',array(
    "[>]departs"=>array("DEPART_ID"=>"DEPART_ID")
),
    array(
        'user.REAL_NAME',
        'user.USER_ID',
        'departs.NAME'

    )
    ,array(
        'STATE[!]'=>0
    )
    );
echo json_encode($re);


?>