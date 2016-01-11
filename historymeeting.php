<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <?php
    include  ("./parameter/mysql/DataOperat.php");
        $db=new DataOperat();
        session_start();
        $id=$_SESSION['uid'];
        $re=$db->fetch_history_meeting($id);
        $num=count($re);

    ?>



</head>
<body>
<div class="container">
    <div class="page-header">
        <h3><strong>历史会议</strong></h3>
    </div>

    <table class="table">
        <caption>已完成的会议</caption>
        <tr>
            <td>
                会议名称
            </td>
            <td>
                会议时间
            </td>
            <td>
                会议发起人
            </td>
            <td>
                会议空间
            </td>

        </tr>
        <?php
            for($i=0;$i<$num;$i++) {
                $row=$re[$i];
                ?>
                <tr>
                    <td>
                        <?php echo $row['NAME']; ?>
                    </td>
                    <td>
                        <?php echo $row['DATE']; ?>
                    </td>
                    <td>
                        <?php echo $row['REAL_NAME']; ?>
                    </td>
                    <td>
                        <div class="form-group">
                            <a href="<?php echo"meetingspace.php?mid=".$row['MEETING_ID'];  ?>"> <button class="btn btn-primary">
                                进入空间
                            </button></a>

                            <button class="btn btn-primary" onclick="alert_info(this.id)" id="<?php echo $row['INSTRUCTION']; ?>">会议详情</button>
                        </div>
                    </td>

                </tr>
            <?php
            }
        ?>


    </table>
<!--    <div class="form-group ">-->
<!--        <button class="btn btn-default"><</button>-->
<!--        <label>1/4</label>-->
<!--        <button class="btn btn-default">></button>-->
<!---->
<!--    </div>-->
</div>
<script type="text/javascript">
    function alert_info(mes)
    {

        alert(mes);
    }

</script>
</body>
</html>