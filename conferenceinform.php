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
    include ("./parameter/class/message.php");
        session_start();
        $mes=$_SESSION['mes'];
        $id=$_SESSION['uid'];
        $db=new DataOperat();
        $mes_info=new message();

        if($mes==0)
        {

        }
             else
            {
               $arr= $db->fetch_single_notice($mes);
                $re=$arr[0];
                $re['STATE']=0;
                $re['NOTICE_ID']=0;
                $re['MEETING_ID']=0;

                $mes_info->initMes($re);

                $db->alter_single_item("user",array(
                    "MES"=>0
                ),array(
                    "USER_ID"=>$id
                ));

                $_SESSION['mes']=0;

            }

        $result= $db->fetchNotice($id);//读取所有通知列表
        $num=count($result);
       // var_dump($result);

    ?>


    <script>
        function hide()
        {
            $("#list").hide();
        }
        $(document).ready(function () {

            if($("#show").length>0)
            {
                hide();
            }
            else
            {
                $("list").slideDown(500);
            }

            $("#show").click(function()
            {
                $("#mes").hide();
                $("#show").hide();
                $("#list").slideDown(500);
            })

        })

    </script>
</head>

<body>
<div class="container">

    <div class="page-header">
        <h3><strong>会议通知</strong></h3>
    </div>

    <?php
        if($mes!=0) {
            ?>
            <div class="panel-body" id="mes">

                <h4>


                    <?php
                        echo $mes_info->getContent();
                    ?>

                    <br>
                    <br>

                    <div class="text-right">发起人：<?php echo $mes_info->getLuncher(); ?><br><?php echo $mes_info->getDate(); ?></div>
                </h4>
            </div>
            <button class="btn btn-success " id="show" >查看通知列表</button>
        <?php
        }


            ?>
            <br>
            <div class="panel-body">
                <table class="table table-striped" id="list">
                    <caption>通知列表</caption>
                    <tr>
                        <th>编号</th>
                        <th>内容</th>
                        <th>来自</th>
                        <th>日期</th>
                        <th>操作</th>


                    </tr>
                    <?php
                        $row=new message();
                        for($i=0;$i<$num;$i++)
                        {

                            $row->initMes($result["$i"]);

                            ?>
                            <tr>
                                <td><?php echo $i+1; ?></td>
                                <td><?php echo $row->getContent(); ?></td>
                                <td><?php echo $row->getLuncher(); ?></td>
                                <td><?php echo $row->getDate(); ?></td>
                                <td><?php
                                    if($row->getState()==0)
                                    {
                                        ?>
                                       <a href="<?php echo "confirm_notice.php?nid=".$row->getId(); ?>" <lable class="btn btn-success">确认通知</lable>
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <lable class="btn btn-primary">已确认</lable>
                                    <?php
                                    }

                                    ?></td></tr>
                            <?php
                        }
                    ?>

                </table>
            </div>







</div>
</body>
</html>