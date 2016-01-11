<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/3
 * Time: 13:38
 */
require_once '../../parameter/Medoo/Resource/medoo.php';

$id=$_POST['id'];
$num;
if($id==1)
{
    $num=5;
}
elseif($id==2)
{
    $num=10;
}
elseif($id==3)
{
    $num=25;
}
elseif($id==4)
{
    $num=50;
}
elseif($id==5)
{
    $num=75;
}
else{
    $num=100;
}

$db=new medoo('meetingmanage');

$re=$db->select('rooms',"num",array(
    "space[>=]"=>$num
));

echo json_encode($re);



?>