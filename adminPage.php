<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>管理中心</title>
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <script>
        $(document).ready(function(){
            $("#101").click(function()
            {
                $("#reactboard").attr("src","departinfo.php");
            })
            $("#102").click(function()
            {
                $("#reactboard").attr("src","addDepart.php");
            })
            $("#103").click(function()
            {
                $("#reactboard").attr("src","delDepart.php");
            })
            $("#201").click(function()
            {
                $("#reactboard").attr("src","person.php");
            })
            $("#202").click(function()
            {
                $("#reactboard").attr("src","addperson.php");
            })
            $("#301").click(function()
            {
                $("#reactboard").attr("src","meetingroom.php");
            })
            $("#302").click(function()
            {
                $("#reactboard").attr("src","addmeetingroom.php");
            })
            $("#datascroll").click(function()
            {
                $("#reactboard").attr("src","databaseUpdate.php");
            })
        })
    </script>

    <?php
    $name='';
    $pwd='';
    if(!$_POST)
    {
        ?>
        <script>
            alert("请登录后操作!");
            document.location.href="./adminLogin.html";

        </script>
    <?php
    }

    ?>

</head>
<body>
<header style="background-color:#ffc30a">
    <div class="myspan">管理员您好! </div>

    <div class="title"></div>
    <div class="logo"></div>
</header>

<pagebody style="background-image:none">
    <div class="container">
        <div class="navileft">
            <div class="col-sm-10" style="margin: 20px">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#panel1">
                                    部门管理
                                </a>
                            </h4>
                        </div>
                        <div id="panel1" class="panel-collapse collapse " >
                            <div class="panel-body">
                                <div class="list-group">
                                    <a class="list-group-item" id="101"  href="#" >
                                        部门一览
                                    </a>
                                    <a class="list-group-item" id="102"  href="#">
                                        新增部门
                                    </a>
                                    <a class="list-group-item" id="103" href="#">
                                        更多操作
                                    </a>

                                </div>
                            </div>

                        </div>


                    </div>
                </div>






                <div class="panel panel-default" style="margin-bottom: 0px">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel2">
                                员工管理
                            </a>

                        </h4>

                    </div>
                    <div class="panel-collapse collapse" id="panel2">
                        <div class="panel-body">
                            <div class="list-group">

                                <a class="list-group-item " id="201" href="#">
                                    员工一览
                                </a>
                                <a class="list-group-item " id="202" href="#">
                                    新增员工
                                </a>



                            </div>

                        </div>
                    </div>
                </div>



                <div class="panel panel-default"  style="margin-bottom: 0px">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#panel3">
                                会议室管理
                            </a>

                        </h4>

                    </div>
                    <div class="panel-collapse collapse" id="panel3">
                        <div class="panel-body">
                            <div class="list-group">

                                <a class="list-group-item " id="301" href="#">
                                    会场一览
                                </a>
                                <a class="list-group-item " id="302" href="#">
                                    新增会场
                                </a>



                            </div>

                        </div>
                    </div>
                </div>



                <div class="panel panel-default"  style="margin-bottom: 0px">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#" id="datascroll">
                                数据库更新
                            </a>

                        </h4>

                    </div>
                    </div>





            </div>


        </div>
        <iframe class="reactboard" id="reactboard" src="default1.html" >

        </iframe>
    </div>

</pagebody>

<footer style="background-color:#ffc30a">
    <center><h1 style="color: white;font-size: 12px;">DesignBy:Group SMT,(All Rihgts Reserved)</h1></center>
</footer>

</body>
</html>