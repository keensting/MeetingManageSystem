<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/8
 * Time: 13:14
 */
require_once './parameter/Medoo/Resource/medoo.php';

$mydb=new medoo('meetingmanage');
$date=date('Y/m/d');

$re=$mydb->select('update','*',array(
    'DATE'=>$date
));




?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./Ajax/Ajax.js"></script>
    <script>
        var xmlHttp=getXmlHttpRequest();
        function doscroll()
        {
            sendRequest('./Ajax/responsPhp/ajax_scroll_database.php',tips,null);
        }
        function tips()
        {
            if(xmlHttp.readyState==4)
            {
                alert('数据已向前滚动！');
                document.location.href='./databaseUpdate.php';
            }
        }
    </script>
    </head>
<body>
<div class="container">
    <div class="page-header">
        <h3><strong>数据更新</strong></h3>
    </div>

    <div class="panel">
        <div class="panel-body">
        <?php
        if($re==false)
        {
            echo '今天数据还未滚动，您可以在22：00之后执行滚动操作！';
            ?>
                <br><label class="btn btn-success"  style="margin: 30px; position:absolute;left:30%;"   onclick="doscroll()" >滚动</label>
            <?php
        }
        else{
            echo '今天的数据已经滚动，请明天22:00之后再进行操作！';
        }
        ?>
    </div>
    </div>

</div>

</body>
</html>