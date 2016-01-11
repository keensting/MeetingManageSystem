<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <?php
    /**
     * Created by PhpStorm.
     * User: KeenSting
     * Date: 2015/6/29
     * Time: 11:12
     */
    session_start();
    $name=$_SESSION['rname'];
    $mes=$_SESSION['mes'];
    $id=$_SESSION['uid'];




    ?>

</head>
<body style="background-color: #ffffff">
    <div class="container">
        <div class="page-header">
            <h3><strong>个人中心</strong></h3>

        </div>

        <div class="float_box">
            <div style="margin: 10%">
                <h4>Welcome</h4>
            </div>
            <div class="container">
                您好，<?php echo $name; ?><br>
                ID:<?php echo $id; ?>
            </div>
        </div>
        <div class="float_box">
            <div class="box-header">
                <h4>会议通知</h4>
            </div>
            <div style="margin: 10%">
               <?php if($mes==0) {
                   echo "您暂无会议通知";
}
               else
               {
                   echo "您有会有会议通知，请及时确认！";
               }
?>
            </div>
        </div>
        <div class="float_box">
            <div class="box-header">
                <h4>日期</h4>

            </div>

            <div style="margin: 10%">
                <?php echo date("Y/m/d") ?>
            </div>
        </div>
        <div class="float_box">
            <div class="box-header">
                <h4>天气</h4>
            </div>
        </div>


    </div>


</body>



</html>


