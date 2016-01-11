<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script>


        var code=0;

        $(document).ready(function(){
            $("#inform").hide();

            $("#ok").click(function()
            {
                $("#inform").slideUp(600);
            });


        });
        function getBoard(id)
        {

            code=id;

            $("#board").attr('src','board.php');

            $("#inform").slideDown(600);

        }


    </script>
    <?php
    include "./parameter/mysql/DataOperat.php";
    include "./parameter/class/room.php";

    /**初始化会议室使用情况
     * @param $arr
     */
    function  change($arr)
    {
        $re=array(0=>array(
            $arr['ONE1'],
            $arr['ONE2'],
            $arr['ONE3'],
            $arr['ONE4'],
            $arr['ONE5'],
            $arr['ONE6']
        ),
            1=>array(
                $arr['TWO1'],
                $arr['TWO2'],
                $arr['TWO3'],
                $arr['TWO4'],
                $arr['TWO5'],
                $arr['TWO6']
            ),
           2=>array(
                $arr['THREE1'],
                $arr['THREE2'],
                $arr['THREE3'],
                $arr['THREE4'],
                $arr['THREE5'],
                $arr['THREE6']
            )
            );
        return $re;
    }

    $db=new DataOperat();
    $re=$db->fetch_room_info();
    $num=count($re);

    ?>


</head>
<body style="background-color: #ffffff">
<div class="container">
    <div class="page-header">
        <h3><strong>会场一览</strong></h3>
    </div>
    <table class="table   table-striped">

            <caption>未来3天内各会场使用情况</caption>
            <thead>
            <tr >
                <th>会议室</th>
                <th>容量</th>
                <th>状态</th>
                <th>投影仪</th>
                <th>话筒</th>
                <th>写字板</th>
                <th>详情</th>
            </tr>
            </thead>

            <tbody>
            <?php
                $row=new room();
                $total_arr=array();
                for($i=0;$i<$num;$i++) {
                    $single = $re[$i];
                    $arr = change($single);
                    $total_arr[$i]=$arr;
                    $row->initRoom($single, $arr);




                    ?>






                    <tr>
                        <td><?php echo $row->getNum();  ?></td>
                        <td><?php echo $row->getSpace();  ?></td>
                        <td>
                            <?php if( $row->getState()==1)
                            {
                                echo ' <h4 style="color: chartreuse">可用</h4>';
                            }
                            else{
                                echo ' <h4 style="color: red">忙碌</h4>';
                            }

                        ?>


                        </td>
                        <td>
                            <?php
                                if($row->getPpt()==1)
                                {
                                    echo "有";
                                }
                            else{
                                    echo "无";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if($row->getMic()==1)
                            {
                                echo "有";
                            }
                            else{
                                echo "无";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if($row->getBoard()==1)
                            {
                                echo "有";
                            }
                            else{
                                echo "无";
                            }
                            ?>
                        </td>
                        <td><label class="btn btn-primary" onclick="getBoard(this.id);" id="<?php echo $i; ?>">详情</label></td>
                    </tr>

                <?php
                }
            ?>



            </tbody>
        </table>
    <ul class="pagination pagination-sm" style="float:right;">
        <li title="第一页"><a href="#">&laquo;</a></li>
        <li title="上一页"><a href="#">&lsaquo;</a></li>
        <li title="当前页" class="active"><a href="#">1</a></li>
        <li title="下一页"><a href="#">&rsaquo;</a></li>
        <li title="最末页"><a href="#">&raquo;</a></li>
        <li>
            <a href="">共<strong><?php echo $num; ?></strong>条记录，<strong>1</strong>页</a>
        </li>
    </ul>

</div>

<script>
        var obj=eval('<?php echo json_encode($total_arr); ?>');//注意一定使用单引号

</script>




<div class="inform" id="inform">
    <iframe id="board" style=" width: 80%;height: 70%; position: absolute;left: 10%;top: 10%;" src="#">

    </iframe>
    <label class="btn btn-primary " style="position: absolute;left:45%;bottom: 10px" id="ok">ok</label>


</div>

</body>
</html>