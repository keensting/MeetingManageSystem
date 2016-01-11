<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>个人中心</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<?php
    include ("./parameter/class/user.php");
    include  ("./parameter/mysql/DataOperat.php");

/*
 * 验证是否是正常登录用户
 */

    if(!$_POST)
    {
        $name='';
        $pwd='';
        $user=new user();
    }
    else {


        $name = $_POST['name'];
        $pwd = $_POST['pwd'];

        $db = new DataOperat();
        $arr = $db->verify($name);

        $user = new user();
    if ($arr == 0)
    {
        ?>
        <script>
            alert("该账号不存在！请注册或重新登录！");
            document.location.href = './index.html';
        </script>



    <?php
    }
    else {

        $user->setUser($arr);


    }

    /*
    * 验证用户身份
    *
    */

    if ($user->getPwd() != $pwd)
    {
    ?>
        <script>
            alert("密码错误！请重试！");
            document.location.href = './index.html';
        </script>
    <?php
    }
    elseif ($user->getState() != 1)
    {
    ?>
        <script>
            alert("无效账号！等待管理员验证！");
            document.location.href = './index.html';
        </script>
    <?php
    }


        session_start();
        $_SESSION['uid']=$user->getId();
        $_SESSION['name']=$user->getName();
        $_SESSION['rname']=$user->getRealName();
        $_SESSION['mes']=$user->getMes();
        $_SESSION['img']=$user->getHeadimg();
        $_SESSION['email']=$user->getEmail();
        $_SESSION['phone']=$user->getPhone();
        $_SESSION['depart']=$user->getDepart();
        $_SESSION['identy']=$user->getIdenty();



    }

?>



    <script>
        function show_mes()
        {
            $("#alert").delay(2000);
            $("#alert").fadeIn(1000);
            $("#alert").delay(1000);
            $("#alert").fadeOut(1200);
        }
        $(document).ready(function(){
            $("#extend1").hide();
            $("#extend2").hide();
            $("#alert").hide();

            show_mes();


            $("#tips").click(function()
            {
                $("#extend1").slideDown(600);

            });
            $("#meeting").click(function()
            {
                $("#extend2").slideDown(600);

            });

            $("#tips").mouseleave(function()
            {
                $("#extend1").slideUp(600);
            });
            $("#meeting").mouseleave(function()
            {
                $("#extend2").slideUp(600);
            });
            $("#inform").click(function()
            {
                $("#frame").attr("src","conferenceinform.php");
            });
            $("#info").click(function()
            {
                $("#frame").attr("src","personinfo.php");
            });
            $("#history").click(function()
            {
                $("#frame").attr("src","historymeeting.php");
            });
            $("#depart").click(function()
            {
                $("#frame").attr("src","departinfo.php");
            });
            $("#room").click(function()
            {
                $("#frame").attr("src","roomsinfo.php");
            });
            $("#book").click(function()
            {
                $("#frame").attr("src","roomreserve.php");
            });
            $("#cancel").click(function()
            {
                $("#frame").attr("src","mymeeting.php");
            });
            $("#myspace").click(function()
            {
                $("#frame").attr("src","myspace.php");
            });
        });
    </script>


</head>
<body>
<?php


if($user->getMes()!=0) {
    ?>
    <div class="alert" id="alert" style="z-index: 999" >
        <h3 style="color: #ffffff">新的会议通知</h3>
        <img src="./img/mes.png" class="img-circle" style="width: 70px;height: 70px;position: absolute;bottom: 0px;">

    </div>

<?php

}
?>
<header>
    <?php

    if(!$_POST) {

        ?>
        <div class="myspan">欢迎,游客9527
            [ <a href="index.html">登录</a>] [
            <a href="signin.php">注册</a>]
        </div>




    <?php
    }
    else {
        ?>
        <div class="myspan">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <div class="form-group btn btn-default">
                    <img class="img-circle" style="width: 30px;height: 30px;" src="<?php echo $user->getHeadimg(); ?>">
                    <label><?php echo $user->getName(); ?></label>
                    <span class="caret"></span>
                </div>
            </a>

            <ul class="dropdown-menu">
                <li><a id="myspace">个人中心</a></li>
                <li><a href="logout.php">注销</a></li>

            </ul>

        </div>
    <?php
    }
    ?>


    <div class="title"></div>
    <div class="logo"></div>
</header>

<pagebody>
    <div class="personal" id="tips">
        <div  class="flow" id="extend1" >
            <label id="inform" class="label">会议通知</label></br>
            <label id="info" class="label">个人信息</label></br>
            <label id="history" class="label">历史会议</label></br>
            <label id="depart" class="label">部门信息</label></br>
            </div>

    </div>
    <div class="meeting" id="meeting" >
        <div class="flow" id="extend2">
            <label id="book" class="label">会议预定</label></br>
            <label id="room" class="label">会场一览</label></br>
            <label id="cancel" class="label">我的会议</label></br>

        </div>
    </div>

    <iframe id="frame" height="550px" width="80%" src="default.html" style="top: 20px;border-radius:10px;right:20px;position: absolute; border: 5px solid white; margin-top: 40px"   ></iframe>
</pagebody>


<footer>
    <center><h1 style="color: white;font-size: 12px;">DesignBy:Group SMT,(All Rihgts Reserved)</h1></center>
</footer>
<?php
    if(!$_POST)
    {
        ?>
        <script>
            alert("请登录后操作!");
            document.location.href="./index.html";

        </script>
<?php
    }
?>
</body>
</html>