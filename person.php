<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <?php
    include './parameter/mysql/DataOperat.php';
    $mydb=new DataOperat();
    $re=$mydb->fetch_person_details();
    $num=count($re);



    ?>
</head>
<body style="background-color: #ffffff">
<div class="container">
    <div class="page-header">
        <h3><strong>员工信息</strong></h3>
    </div>
    <table class="table table-striped">
        <caption>
            <h4>员工信息一览</h4>

        </caption>

        <tr>
            <th>编号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>部门</th>
            <th>职位</th>
            <th>手机</th>
            <th>邮箱</th>
            <th>操作</th>
        </tr>
        <?php


        for($i=0;$i<$num;$i++) {
            $row=$re[$i];
            ?>

            <tr>
                <td><?php echo $row['USER_ID'];  ?></td>
                <td><?php echo $row['REAL_NAME'];  ?></td>
                <td><?php
                        if($row['SEX']==0)
                        {
                            echo '女';
                        }else{
                            echo '男';
                        }
                    ?></td>
                <td><?php echo $row['DNAME'];  ?></td>
                <td><?php
                        if($row['IDENTY']==1)
                        {
                            echo '助理';

                        }
                    elseif($row['IDENTY']==2)
                    {
                        echo "经理";
                    }
                    elseif($row['IDENTY']==3)
                    {
                        echo '副经理';
                    }else{
                            echo  '员工';
                        }

                    ?></td>
                <td><?php echo $row['PHONE'];  ?></td>
                <td><?php echo $row['EMAIL'];  ?></td>
                <td>
                    <div class="form-group">
                        <label class="btn btn-default" onclick="modify(<?php echo $row['USER_ID'] ;  ?>)">修改</label>
                        <label class="btn btn-default" onclick="delete_person(<?php echo $row['USER_ID'] ;  ?>)">删除</label>
                    </div>
                </td>
            </tr>

        <?php
        }
        ?>

    </table>
    </div>

</body>
<script>
    function delete_person(id)
    {
        var t=confirm('确认删除该人？');
        if(t==true)
        {
            document.location.href='./deal_del_person_require.php?id='+id;
        }
    }

    function modify(id)
    {
        document.location.href='./modifyperson.php?id='+id;
    }
</script>
</html>