<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <?php
    include './parameter/mysql/DataOperat.php';

        $id=$_GET['id'];
         session_start();
         $_SESSION['uid']=$id;
        $mydb=new DataOperat();
        $re=$mydb->fetch_person_details_single($id);

        $arr=$re[0];
        $dep=$mydb->fetch_depart_info();
        $num=count($dep);



    ?>
</head>
<body>
<div class="container">
    <div class="page-header">
        <h3><strong>修改人员信息</strong></h3>
    </div>




    <form method="post" action="./deal_modify_person_require.php" class=" col-md-6" style="margin-left: 15%;" >

        <div class="form-group">

            <label  class="mainW1 col-md-4"> 用户名：</label>
            <input class="form-control"  name="name" id="name" value="<?php echo $arr['REAL_NAME'];  ?>"/>

        </div>
        <div class="form-group">

            <label  class="mainW1 col-md-4"> 邮箱：</label></td>
            <input class="form-control" name="mail" id="mail" value="<?php echo $arr['EMAIL'];  ?>"/>

        </div>
        <div class="form-group">

            <label  class="mainW1 col-md-4"> 手机：</label>
            <input class="form-control"  name="tel" id="tel" value="<?php echo $arr['PHONE'];  ?>"/>

        </div>



        <div class="form-group">

            <label  class="mainW1 col-md-4"> 部门：</label>
            <select class="form-control" name="depart" id="depart" >
                <?php
                    for($i=0;$i<$num;$i++)
                    {
                        $row=$dep[$i];
                        ?>
                        <option value="<?php echo $row['DEPART_ID'];  ?>"><?php echo $row['NAME'];  ?></option>
                <?php
                    }

                ?>

            </select>

        </div>

        <div class="form-group">

            <label  class="mainW1 col-md-4"> 职位：</label>
            <select class="form-control" name="position" id="position " >
                <option value="0">员工</option>
                <option value="1">助理</option>
                <option value="2">经理</option>
                <option value="3">副经理</option>


            </select>

        </div>
        <div class="form-group text-center">
            <a href="./person.php"> <button class="btn btn-default" type="reset">取消</button></a>
            <button class="btn btn-default" type="submit">修改</button>
        </div>
    </form>



</div>

</body>
</html>