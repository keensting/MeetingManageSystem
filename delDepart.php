<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./Ajax/Ajax.js"></script>
    <script>
        var xmlHttp=getXmlHttpRequest();
        function tips(num,id)
        {
            if(num!=0) {
                var t = confirm("该部门人员不为零，是否转移？");
                if (t == true) {
                    document.location.href = "./delresponse.php?id="+id;//test
                }
                else {

                }
            }
            else{
                var a=confirm('确认删除该部门？');
                if(a==true) {
                    sendRequest('./Ajax/responsPhp/ajax_del_depart.php', info, 'id=' + id);
                }

            }

        }

        function info()
        {
            if(xmlHttp.readyState==4)
            {

                alert('部门已从列表中移除！');
                document.location.href='./delDepart.php';
            }
        }

        function modify(id)
        {
            document.location.href='./modify_depart_page.php?id='+id;
        }
    </script>
    <?php
        include './parameter/mysql/DataOperat.php';
        include  './parameter/class/depart.php';
        $mydb=new DataOperat();
        $re=$mydb->fetch_depart_info();
        $num=count($re);
        $counter=array();
    ?>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h3><strong>更多操作</strong></h3>
        </div>
        <table class="table table-striped">
            <caption> 部门信息一览</caption>
            <tr>
                <th>部门名称</th>
                <th>部门编码</th>
                <th>部门人数</th>
                <th>相关操作</th>

            </tr>

            <?php
                $row=new depart();
                for($i=0;$i<$num;$i++)
                {
                    $row->initDepart($re[$i]);
                    ?>
                    <tr>
                        <td><?php echo $row->getName(); ?></td>
                        <td><?php echo $row->getId(); ?></td>
                        <td><?php
                               $counter[$i]= $mydb->fetch_depart_num($row->getId());
                            echo $counter[$i];
                            ?></td>
                        <td><label class="btn btn-primary" onclick="tips(<?php  echo $counter[$i].",".$row->getId();  ?>)"> 删除</label>
                            <label class="btn btn-primary" onclick="modify(<?php  echo $row->getId();  ?>)"> 修改</label>

                        </td>
                    </tr>
            <?php
                }
            ?>


        </table>


    </div>

</body>
</html>