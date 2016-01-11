<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <?php
    require_once './parameter/Medoo/Resource/medoo.php';
    $id=$_GET['id'];
    session_start();
    $_SESSION['rid']=$id;

    $mydb=new medoo('meetingmanage');
    $re=$mydb->select('rooms',array(
        'NUM',
        'SPACE'

    ),array(
        'ROOM_ID'=>$id
    ));

    $arr=$re[0];
    ?>
</head>

<body>
<div class="container">
    <div class="page-header">
        <h3><strong>修改会议室</strong></h3>
    </div>
    <form class="col-md-8" method="post" action="deal_modify_room_require.php">
        <fieldset class="form-horizontal" >
            <legend>修改信息</legend>
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">会议室：</label>
                <div class="col-md-8">
                    <input type="text" id="num" name="num" value="<?php echo $arr['NUM'] ; ?>" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">容量：</label>
                <div class="col-md-8">
                    <input type="text" id="space" name="space" value="<?php echo $arr['SPACE'] ; ?>" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">投影仪：</label>
                <div class="col-md-8">
                    <select id="ppt"  name="ppt" class="form-control" >
                        <option value="1">有</option>
                        <option value="0">无</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">话筒：</label>
                <div class="col-md-8">
                    <select id="mic" name="mic"  class="form-control" >
                        <option value="1">有</option>
                        <option value="0">无</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">写字板：</label>
                <div class="col-md-8">
                    <select  id="board" name="board"  class="form-control" >
                        <option value="1">有</option>
                        <option value="0">无</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">状态：</label>
                <div class="col-md-8">
                    <select  id="state" name="state"  class="form-control" >
                        <option value="1">可用</option>
                        <option value="0">不可用</option>
                    </select>
                </div>
            </div>





        </fieldset>
        <div class="text-center form-group">
            <button type="submit" class="btn btn-primary">修改</button>
            <a href="./meetingroom.php"> <button type="button" class="btn btn-default">取消</button></a>
        </div>
    </form>
</div>

</body>
</html>