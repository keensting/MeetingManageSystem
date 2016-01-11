<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/6/29
 * Time: 13:13
 */
require_once './Resource/medoo.php';

$database=new medoo('meetingmanage');

$database->update("attendence",array(
    "PERSON_STATE"=>0
),array(
    "AND"=>array(
        "MEETING_ID"=>40000,
        "USER_ID"=>10000
    )
));

?>