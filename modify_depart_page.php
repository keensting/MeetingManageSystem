<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <?php
        $id=$_GET['id'];
        require_once './parameter/Medoo/Resource/medoo.php';
        require_once './parameter/class/depart.php';
        $mydb=new medoo('meetingmanage');
        $re=$mydb->select('departs','*',array(
            'DEPART_ID'=>$id
        ));

        session_start();
        $_SESSION['did']=$id;

    ?>
</head>
<body>

<div class="container">
    <div class="page-header">
        <h3><strong>修改部门</strong></h3>
    </div>
    <form class="col-md-8" action="./deal_modify_depart_request.php" method="post" >
        <fieldset class="form-horizontal" >
            <legend>修改部门信息</legend>
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">名称：</label>
                <div class="col-md-8">
                    <input type="text" id="name" name="name" value="<?php echo $re[0]['NAME'];  ?>" class="form-control" />
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-md-2 control-label">电话：</label>
                <div class="col-md-8">
                    <input type="text" id="tel" name="tel" value="<?php echo $re[0]['PHONE'];  ?>" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">简介：</label>
                <div class="col-md-8">
                    <textarea  id="info" name="info"  class="form-control" style="height: 100px;"rows="10" />
                    <?php echo $re[0]['INSTRUCTION'];  ?>
                    </textarea>
                </div>
            </div>




        </fieldset>
        <div class="text-center form-group">
            <button type="submit" class="btn btn-primary">修改</button>
            <a href="./delDepart.php"> <button type="button" class="btn btn-default">取消</button></a>
        </div>
    </form>
</div>


</body>
</html>