<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>注册</title>
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet " href="./bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="./css/font.css">
    <?php
        include './parameter/mysql/DataOperat.php';

         $db=new DataOperat();
         $deps=$db->selectItem('departs',array(
             "DEPART_ID",
             "NAME"
         ));

        $num=count($deps);


        if($_POST)
        {
            $name=$_POST['name'];
            $mail=$_POST['mail'];
            $pwd=$_POST['pwdb'];
            $pwda=$_POST['pwda'];
            $rname=$_POST['rname'];
            $sex=$_POST['sex'];
            $phone=$_POST['phone'];
            $depart=$_POST['depart'];
            $position=$_POST['position'];


            $max=$db->getMaxId("USER_ID","user");
            $id=0;
            if($max==0)
            {
                $id=10000;
            }
            else{
                $id=$max+1;
            }
            if($name==''||$mail==''||$pwd==''||$pwda==''||$rname==''||$sex==''||$phone=='')
            {
            ?>
            <script>
                alert("注册信息不完整！！！");
                document.location.href='./signin.php';
            </script>
        <?php
            }

            if($pwd!=$pwda)
            {
            ?>
            <script>
                alert("两次输入密码不一致！");
                document.location.href='./signin.php';
            </script>
        <?php
            }
            else
        {

                    $re1 = $db->checkItem('user', 'USER_ID', "$name");
                    $re2 = $db->checkItem('user', 'EMAIL', "$mail");

                    if ($re1 == false && $re2 == false)
                    {
                    $arr = array(
                        "USER_ID" => $id,
                        "EMAIL" => $mail,
                        "PHONE" => $phone,
                        "NAME" => $name,
                        "REAL_NAME" => $rname,
                        "PWD" => $pwd,
                        "IDENTY" => $position,
                        "HEAD_IMG" => "./assert/user/headimg/4.jpg",
                        "SEX" => $sex,
                        "DEPART_ID" => $depart,
                        "STATE" => 1,
                        "MES" => 0


                    );

                    $db->insertItem('user', $arr);
                    ?>
                        <script>
                            alert('注册成功，管理员即将验证您的信息，现在您可以使用账号登录了！');
                            document.location.href = './index.html';
                        </script>

                    <?php


                    }
                    else
                    {
                    ?>
                        <script>
                            alert("用户名或邮箱已存在！");
                            document.location.href = './signin.php';
                        </script>
                    <?php
                    }
        }






        }


    ?>



</head>
<body>
<header>
    <div class="myspan">欢迎,游客9527 [<a href="index.html"> 登录</a>]</div>
    <div class="title"></div>
    <div class="logo"></div>
</header>
<pagebody>

    <div class="container">
        <div class="page-header">
            <h3 style="font-size: 30px;color: #ffffff"><strong>注册</strong></h3>
        </div>

        <form method="post" action="./signin.php" class=" col-md-6" style="margin-left: 20%;">
            <div class="form-group">

                    <label  class="mainW1 col-md-4"> 用户名：</label>
                    <input class="form-control"  name="name" id="name" placeholder="输入您的用户名"/>


            </div>
            <div class="form-group">

                <label  class="mainW1 col-md-4"> 邮箱：</label>
                 <input class="form-control" name="mail" id="mail" placeholder="输入您的邮箱" type="email"/>

            </div>

            <div class="form-group">

                <label  class="mainW1 col-md-4"> 设置密码：</label>
                <input class="form-control" name="pwdb" id="pwdb" placeholder="设置密码" type="password"/>

            </div>

            <div class="form-group">

                <label  class="mainW1 col-md-4"> 确认密码：</label>
                <input class="form-control" name="pwda" id="pwda" placeholder="确认您的密码" type="password"/>

            </div>
            <div class="form-group">

                <label  class="mainW1 col-md-4"> 姓名：</label>
                <input class="form-control" name="rname" id="rname" placeholder="输入您的真实姓名"/>

            </div>
            <div class="form-group">

                <label  class="mainW1 col-md-4"> 性别：</label>

                    <label class="radio-inline">
                        <input type="radio" name="sex" id="female" value="0">女</label>
                    <label class="radio-inline">
                        <input type="radio" name="sex" id="male" value="1">男</label>

            </div>

            <div class="form-group">

                <label  class="mainW1 col-md-4"> 手机：</label>
                <input class="form-control" name="phone" id="phone" placeholder="输入您的手机号" />

            </div>
            <div class="form-group">

                <label  class="mainW1 col-md-4"> 部门：</label>
                <select class="form-control" name="depart" id="depart" >
                    <?php
                        for($i=0;$i<$num;$i++)
                        {
                            ?>
                            <option value="<?php  echo $deps[$i]['DEPART_ID'];   ?>"><?php echo $deps[$i]['NAME']; ?></option>
                            <?php
                        }


                    ?>



                </select>

            </div>

            <div class="form-group">

                <label  class="mainW1 col-md-4"> 职位：</label>
                <select class="form-control" name="position" id="position " >
                    <option value="0" selected="true">员工</option>
                    <option value="1">助理</option>
                    <option value="2">经理</option>
                    <option value="3">副经理</option>


                </select>

            </div>
            <div class="form-group text-center">
                <button class="btn btn-default" type="reset">重置</button>
                <button class="btn btn-default" type="submit">提交</button>
            </div>









        </form>
    </div>

</pagebody>



<footer>
    <center><h1 style="color: white;font-size: 12px;">DesignBy:Group SMT,(All Rihgts Reserved)</h1></center>
</footer>
</body>
</html>