<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/7
 * Time: 13:20
 */
$id=$_POST['id'];

include '../../parameter/Medoo/Resource/medoo.php';
$mydb=new medoo('meetingmanage');

$mydb->delete('departs',array(
    'DEPART_ID'=>$id
));


?>