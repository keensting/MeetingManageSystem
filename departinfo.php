<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <?php
        include "./parameter/mysql/DataOperat.php";
        include "./parameter/class/depart.php";

        $db=new DataOperat();
        $re=$db->fetch_depart_info();
        $num=count($re);

    ?>
</head>
<body >
<div class="container">
    <div class="page-header">
        <h3><strong>部门信息</strong></h3>
    </div>
    <div class="col-lg-8">
        <div class="panel-group" id="accordion"><!-- 整个版面-->

            <?php
                $row=new depart();
                for($i=0;$i<$num;$i++) {
                    $row->initDepart($re[$i]);

                    ?>

                    <div class="panel panel-default"><!-- 单个伸缩项-->
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#panel<?php echo $i + 1; ?>">
                                    <?php echo $row->getName();?>
                                </a>
                            </h4>
                        </div>
                        <div id="panel<?php echo $i + 1; ?>" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="list-group" style="margin: 0">
                                    <a class="list-group-item " href="#">
                                        简介：<?php echo $row->getInstru(); ?><span class="badge"><?php echo $row->getPhone();  ?></span>
                                    </a>
                                    <?php
                                        $members=$db->fetch_depart_member($row->getId());
                                        $counter=count($members);
                                        for($k=0;$k<$counter;$k++) {
                                            $arr=$members[$k];
                                            ?>
                                            <a class="list-group-item <?php if($arr['IDENTY']>1){echo "active";} ?>">
                                                <?php echo $arr['REAL_NAME'];?>
                                                <span class="badge">
                                                    <?php
                                                        if($arr['IDENTY']==1)
                                                        {

                                                            echo "助理";
                                                        }
                                                    elseif($arr['IDENTY']==2)
                                                    {
                                                        echo "经理";
                                                    }
                                                    elseif($arr['IDENTY']==3)
                                                    {
                                                        echo "副经理";
                                                    }
                                                    else
                                                    {
                                                        echo "员工";
                                                    }
                                                    ?>
                                                </span>
                                            </a>
                                        <?php
                                        }
                                    ?>

                                </div>
                            </div>
                        </div>


                    </div>

                <?php
                }
            ?>


            </div>
        </div>
    </div>

</div>

</body>
</html>