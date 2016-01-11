<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/6
 * Time: 15:29
 */
$mid=$_GET['mid'];
session_start();
$_SESSION['meetingid']=$mid;

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="Ajax/Ajax.js"></script>
    </head>
<body style="background-color: #ffffff">
<div class="container">
    <div class="page-header">
        <h3><strong>上传文件</strong></h3>
    </div>
    <form method="post" action="uploadDeal.php" enctype="multipart/form-data">
        <div class="form-group col-sm-12">
            <label>选择文档</label>

        <input type="file" name="file" id="file">


        </div>
        <div class="form-group col-sm-12">
            <label>文档类型</label>
            <select name="type" id="type">
                <option value="1">会议文档</option>
                <option value="2">会议纪要</option>
            </select>

        </div>
        <div class="form-group col-sm-12">
            <label class="btn btn-default" onclick="document.location.href='./mymeeting.php'">返回</label>
            <button type="submit" class="btn btn-default">提交</button>
            </div>
    </form>
</div>

</body>
</html>