<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/6
 * Time: 9:05
 */

include ("../../parameter/Medoo/Resource/medoo.php");

$db=new medoo("meetingmanage");
$id=$_POST['id'];

$re=$db->select('rooms',
    array(
        'ONE1',
        'ONE2',
        'ONE3',
        'ONE4',
        'ONE5',
        'ONE6',
        'TWO1',
        'TWO2',
        'TWO3',
        'TWO4',
        'TWO5',
        'TWO6',
        'THREE1',
        'THREE2',
        'THREE3',
        'THREE4',
        'THREE5',
        'THREE6',



    ),
    array(
        "NUM"=>$id
    ));

$arr=$re[0];
return $arr;

?>