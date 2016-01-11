<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/7
 * Time: 13:09
 */
session_start();
$did=$_SESSION['did'];
$id=$_POST['depart'];

include './parameter/Medoo/Resource/medoo.php';
$mydb=new medoo('meetingmanage');
//换部门
$mydb->update('user',array(
    'DEPART_ID'=>$id
),array(
    'DEPART_ID'=>$did
));
//删除部门
$mydb->delete('departs',
    array(
        'DEPART_ID'=>$did
    ));

?>
<html>
<head>

</head>
<body>
<script>
    alert("部门人员已经转移，部门已从列表中删除!");
</script>
    <meta http-equiv="refresh" content="1;href='./delDepart.php'";
</body>
</html>