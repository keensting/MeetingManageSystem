<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="Ajax/Ajax.js"></script>
    <script>
        var xmlHttp=getXmlHttpRequest();
        /*
        收起面板，用按钮控制
        */
        $(document).ready(function()
        {
            $("#inform").hide();
            $("#ok").click(function()
            {
                $("#inform").slideUp(600);
            })


        })
        /*
            退订会议
        */
        function show_confirm(id)
        {
            var txt=confirm("您真的要退订该会议？")
            if(txt==true)
            {

                sendRequest('./Ajax/responsPhp/ajax_unsubscribe_meeting.php',unsubscribe,'id='+id);
            }
            else
            {
                alert("会议将被保留");
            }
        }
        function unsubscribe()
        {
            if(xmlHttp.readyState==4)
            {
                var v=xmlHttp.responseText;
                alert(v);
                alert("会议已退订，通知即将发下！");
                document.location.href = './mymeeting.php';
            }
        }


        /*
            相应结束按钮
        */
        function endMeeting(id)
        {
            alert(id);
            sendRequest('./Ajax/responsPhp/ajax_end_meeting.php',tips,'id='+id);
        }
        function tips()
        {
            if(xmlHttp.readyState==4) {

                alert("会议已结束！");
                document.location.href = './mymeeting.php';
            }
        }
        /*
        刷新会议面板
         */
        function refresh_board(id)
        {

            sendRequest('./Ajax/responsPhp/ajax_attendence_board.php',sucess,'id='+id);
        }
        function sucess()
        {
            if(xmlHttp.readyState==4) {
                var response = xmlHttp.responseText;

                var obj = JSON.parse(response);
                //alert(response);
                var num = obj.length;
//                for(var i=0;i<num;i++)
//                {
//                    for(var key in obj[i])
//                    {
//                        alert("key:="+key+",value="+obj[i][key]);
//                    }
//                }

//                var single=obj[0];
//                alert(single['NAME']);
                window.document.getElementById('body').innerHTML="";
                for(var i=0;i<num;i++)
                {

//
                    if(obj[i]['PERSON_STATE']==0)//收到信息
                    {
                        window.document.getElementById('body').innerHTML+='<div style="margin: 20px;float: left" ><label class="btn btn-success">'+obj[i]['REAL_NAME']+'</label></div>'

                    }
                    else{
                        window.document.getElementById('body').innerHTML+='<div style="margin: 20px;float: left" ><label class="btn btn-danger">'+obj[i]['REAL_NAME']+'</label></div>'
                    }
//

                }


            }
        }

        function show_board(id)
        {

            refresh_board(id);
            $("#inform").slideDown(600);
        }
    </script>

    <?php
        include './parameter/mysql/DataOperat.php';
        include './parameter/class/meeting.php';
/*
 * 展示该用户所有的会议
 */
        session_start();
        if($_SESSION) {
            $uid = $_SESSION['uid'];
            $db = new DataOperat();

            $re = $db->fetch_meeting($uid);
            $num = count($re);
        }
    else{
        echo"<script> alert('请登录！');
document.location.href='./index.html';
            </script>";

    }


    ?>

</head>
<body style="background-color: #ffffff">
        <div class="container">
            <div class="page-header">
                <h3><strong>我的会议</strong></h3>
            </div>
            <table class="table table-striped">
                <caption>
                    <h4>我预定会议</h4>

                </caption>

                <tr>
                    <th>会议名</th>
                    <th>会议地点</th>
                    <th>会议日期</th>
                    <th>会议时间</th>
                    <th>操作</th>
                </tr>

                <?php
                    $row=new meeting();
                    for($i=0;$i<$num;$i++)
                    {
                        $row->initMeeting($re[$i]);




                ?>



                <tr>
                    <td><?php echo $row->getName(); ?></td>
                    <td><?php echo $row->getRid(); ?></td>
                    <td><?php echo $row->getDate(); ?></td>
                    <td><?php
                            if($row->getTime()==1)
                            {
                                echo "8:00-9:30";
                            }
                        elseif($row->getTime()==2)
                        {
                            echo "10:00-11:30";
                        }
                        elseif($row->getTime()==3)
                        {
                            echo "13:00-14:30";
                        }
                        elseif($row->getTime()==4)
                        {
                            echo "15:00-16:30";
                        }
                        elseif($row->getTime()==5)
                        {
                            echo "18:00-19:30";
                        }
                        else{
                            echo "20:00-21:30";
                        }

                        ?></td>
                    <td>
                        <div class="form-group">
                            <label class="btn btn-default" onclick="show_confirm(<?php echo $row->getId(); ?>)" >退订</label>
                            <a href=<?php echo "./upload.php?mid=".$row->getId(); ?>> <label class="btn btn-default" >上传文件</label></a>
                            <label class="btn btn-default"  onclick="show_board(this.id)" id="<?php echo $row->getId();  ?>">会议面板</label>
                            <?php
                            if($row->getState()==1)
                            {
                                ?>

                                <label class="btn btn-primary" onclick="endMeeting(<?php echo $row->getId();  ?>)" >结束</label>
                            <?php
                            }
                            ?>

                        </div>
                    </td>
                </tr>

                <?php
                }
                ?>

            </table>
            <ul class="pagination pagination-sm" style="float:right;">
                <li title="第一页"><a href="#">&laquo;</a></li>
                <li title="上一页"><a href="#">&lsaquo;</a></li>
                <li title="当前页" class="active"><a href="#">1</a></li>
                <li title="下一页"><a href="#">&rsaquo;</a></li>
                <li title="最末页"><a href="#">&raquo;</a></li>
                <li>
                    <a href="">共<strong><?php echo $num;  ?></strong>条记录，<strong>1</strong>页</a>
                </li>
            </ul>

        </div>



        <div class="inform" id="inform" >
            <table style="width: 80%;height: 70%; position: absolute;left: 10%;top: 10%; border: 2px solid #ffffff"  >
                <caption>参会人员确认信息一览


                </caption>


                <tbody id="body">




                </tbody>
            </table>
            <label class="btn btn-primary " style="position: absolute;left:45%;bottom: 10px" id="ok">ok</label>


        </div>

</body>
</html>