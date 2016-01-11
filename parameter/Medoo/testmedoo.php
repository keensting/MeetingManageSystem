<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/6/27
 * Time: 13:51
 */
require_once './Resource/medoo.php';

/*
 * 连接数据库
 */

echo "_______________\n";
$database=new medoo('meetingmanage');
print_r($database->info());
/*
 * 查看错误信息
 */
echo "_______________\n";
$database->select("bccount", array(
    "user_name",
    "email"
), array(
    "user_id[<]" => 20
));

var_dump($database->error());

/*
 * 查看上一条query
 */
echo "_______________\n";

$last_user_id = $database->insert("test", array(
    "user" => "fooa",
    "email" => "foo@bar.com",
    "id" => 25,
    "pwd"=>"smart",
    "name" => array("en", "fr", "jp", "cn")
));

echo $database->last_query();


/*
 * quote函数，单引号
 */
echo "_______________\n";
$data="Medoo";
echo "we love".$data."\n";
echo "we love".$database->quote($data);

/*
 * query()函数
 */
echo "_______________\n";

$data1=$database->query("select * from test")->fetchAll();
print_r($data1);

/*
 * where的使用
 */
echo "_______________\n";

$re=$database->select('test','user',array("id"=>25));

echo $re[0];
/*
 * where的使用(in)
 */
$re=$database->select('test','user',array(
    "id"=>array(25,30,100)));
echo $re[0];
/*
 * where的使用(between)
 */
$re=$database->select('test','user',array(
    "id[<>]"=>[10,100]));
echo $re[0];

/*
 * where的使用(or and)
 */
$re=$database->select('test','user',array(
    "OR"=>array(
        "id"=>array(25,30,11),
        "pwd"=>array('smart','kaaa')
        )
    ));
echo $re[0];



/*
 * select的使用
 */
echo "_______________\n";

$aa=$database->select('test',array("user","email","pwd"),array("id"=>25));

var_dump($aa);
echo "_______________\n";
print_r($aa);
echo "_______________\n";
var_export($aa);
echo "_______________\n";
$num=count($aa);
echo $num.$aa[0]['user'];
$arr=array();
$arr=$aa[0];
echo $arr['user'];
$arr=array("name"=>"keensting","id"=>11111);
$j=json_encode($aa);
echo $j;
/*
 * 关联查询某用户的所有通知
 */
echo "_______________\n";
$result=$database->select('notice',
    array(
        "[<]inform"=>array("INFORM_ID"=>"INFORM_ID")

    ),
    array(
        "notice.USER_ID",
        "inform.DATE",
        "inform.CONTENT",
        "notice.STATE"

    ),
    array(
        "notice.USER_ID"=>10000,



    )


);

var_dump($result);



?>