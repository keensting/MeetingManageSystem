<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/1
 * Time: 10:28
 */
header("Content-type:text/html");

$arr=array(
    "name"=>"keensting",
    "age"=>22,
    "sex"=>1

);
//echo $_POST['qq'];
//if($_POST['qq']==111){
    echo json_encode($arr);
//}
//else{
//    echo "haha";
//}
?>
