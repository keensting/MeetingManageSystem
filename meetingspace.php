<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#001").hide();
            $("#002").hide();

            $("#word").click(function()
            {
                $("#001").fadeIn(800);
            });
            $("#doc").click(function()
            {
                $("#002").fadeIn(800);
            });
        });
    </script>

    <?php
    include  ("./parameter/mysql/DataOperat.php");
    include  ('./parameter/class/doc.php');
        $id=$_GET['mid'];

        $db=new DataOperat();
        $re1=$db->fetch_doc($id);
        $num1=count($re1);
        $re2=$db->fetch_txt($id);
        $num2=count($re2);

    ?>

</head>
<body>
<div class="container">
    <div class="page-header">
        <h3><strong>会议文档空间</strong></h3>

    </div>
    <table class="table">
        <caption>文档集合</caption>
        <tr>
            <td><img class="img-thumbnail" style="width: 100px;height: 100px" src="./img/word.png" id="word"></td>
            <td><img class="img-thumbnail"  style="width: 100px;height: 100px" src="./img/Documents.png" id="doc"></td>
        </tr>
        <tr>
            <td>会议文档</td>
            <td>会议纪要</td>
        </tr>
    </table>
    <table class=" table table-bordered" style="width: 60%" id="001">
        <?php
            if($num1==0)
            {
                echo "<lable>暂无文档！</lable>";
            }
        else {
                $row=new doc();
            for ($i = 0; $i < $num1; $i++) {
                $row ->initDoc( $re1[$i]);




                ?>
                <tr>

                    <td style="width:80%;"><?php echo $row->getName(); ?></td>
                    <td><a href="<?php echo $row->getPath(); ?>" target="_blank"><label class="btn-default">下载</label></a></td>
                </tr>
            <?php
            }
        }
        ?>

    </table>
    <table class="table table-bordered" style="width: 60%" id="002">
        <?php
        if($num2==0)
        {
            echo "<lable>暂无文档！</lable>";
        }
        else {
            $row=new doc();
            for ($i = 0; $i < $num2; $i++) {
                $row ->initDoc( $re2[$i]);




                ?>
                <tr>

                    <td style="width:80%;"><?php echo $row->getName(); ?></td>
                    <td><a href="<?php echo $row->getPath(); ?>" target="_blank"><label class="btn-default">下载</label></a></td>
                </tr>
            <?php
            }
        }
        ?>
    </table>

    <a href="historymeeting.php">
        <img class="img-circle" style="width: 100px;height: 100px; border: 5px solid chartreuse;position:absolute;right: 80px; top:280px" title="back" src="./img/back.png">
    </a>

</div>

</body>
</html>