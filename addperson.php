<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <?php
    include './parameter/mysql/DataOperat.php';
    $db=new DataOperat();
    $deps=$db->selectItem('departs',array(
        "DEPART_ID",
        "NAME"
    ));

    $num=count($deps);
    ?>


</head>
<body>
<div class="container">
    <div class="page-header">
        <h3><strong>新增员工</strong></h3>
    </div>
    <form class="col-md-8" method="post" action="./deal_add_person_require.php">
        <fieldset class="form-horizontal" >
            <legend>填写员工信息</legend>

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">姓名：</label>
                <div class="col-md-4">
                    <input type="text" id="name" name="name" placeholder="员工姓名" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">性别：</label>
                <div class="col-md-4">
                    <label class="radio-inline">
                        <input type="radio" name="sex" id="female" value="0">女</label>
                    <label class="radio-inline">
                        <input type="radio" name="sex" id="male" value="1">男</label>
                </div>
            </div>
            <div class="form-group">

                <label  class="col-md-4 control-label" > 部门：</label>
                <div class="col-md-4">
                <select class="form-control" name="depart" id="depart" >
                    <?php
                    for($i=0;$i<$num;$i++)
                    {
                        ?>
                        <option value="<?php  echo $deps[$i]['DEPART_ID'];   ?>"><?php echo $deps[$i]['NAME']; ?></option>
                    <?php
                    }


                    ?>



                </select></div>

            </div>
            <div class="form-group">

                <label  class="col-md-4 control-label"> 职位：</label>
                <div class="col-md-4">
                <select class="form-control" name="position" id="position " >
                    <option value="0" selected="true">员工</option>
                    <option value="1">助理</option>
                    <option value="2">经理</option>
                    <option value="3">副经理</option>


                </select></div>


            </div>
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">手机：</label>
                <div class="col-md-4">
                    <input type="text" id="tel" name="tel" placeholder="手机号码" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">邮箱：</label>
                <div class="col-md-4">
                    <input type="text" id="mail" name="mail" placeholder="邮箱地址" class="form-control" />
                </div>
            </div>





        </fieldset>
        <div class="text-center form-group">
            <button type="submit" class="btn btn-primary">添加</button>
            <a href="./person.php"> <button type="button" class="btn btn-default">取消</button></a>
        </div>
    </form>
</div>

</body>
</html>