<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="Ajax/Ajax.js"></script>
    <script type="text/javascript">

        $(document).ready(function()
        {
            get_employee();
        });
        var xmlHttp=getXmlHttpRequest();
        var state;

        /*
        根据容量添加房间
         */
            function getrooms()
            {
                //alert("hahahaaaaa");
                var num =document.getElementById('num').value;
                sendRequest("./Ajax/responsPhp/ajax_get_rooms.php",addrooms,'id='+num);

            }
            function addrooms()
            {
                if(xmlHttp.readyState==4)
                {
                    var res=xmlHttp.responseText;
                    var obj=JSON.parse(res);
                    var num=obj.length;
                    window.document.getElementById('room').innerHTML+='';

                    for(var i=0;i<num;i++)
                    {

                      window.document.getElementById('room').innerHTML+="<option value='"+obj[i]+"'>"+obj[i]+"</option>"//加window
                    }
                    //alert("hahah");
                  //  $('#room').innerHTML=""
                    //alert(res);
                }

            }

        /*
         根据房间获得空闲信息
        */
        function get_room_state()
        {


            alert("会场空闲时间请参考会场详情！");
            window.open("./roomsinfo.php");

        }


        /*
        获取参与者名单
         */

        function get_employee()
        {
            sendRequest("./Ajax/responsPhp/ajax_get_employee.php",showperson,null);
        }
        function showperson()
        {
            if(xmlHttp.readyState==4)
            {
                var re=xmlHttp.responseText;
                //alert(re);
                var obj=JSON.parse(re);
               // alert(obj[0]['REAL_NAME']);
                var num=obj.length;

                for(var i=0;i<num;i++)
                {
                    window.document.getElementById('person').innerHTML+="<tr><td> <label><h4 >"+obj[i]['REAL_NAME']+"</h4></label></td>"+
                                        "<td><label><h4 >"+obj[i]['NAME']+"</h4></label></td>"+
                                            "<td><label><h4 ><input type='checkbox' name='chk[]'  value='"+obj[i]['USER_ID']+"' ></h4></label></td></tr>";
                }
            }
        }



    </script>
</head>
<body style="background-color: #ffffff">
    <div class="container">
        <form method="post" action="./reserveDeal.php" onsubmit="return confirm_mes()">
        <div class="page-header">
            <h3><strong>会议预定</strong></h3>

        </div>
        <div  class="meeting-reserve">
            <div class="meet-item" style="top:150px;" id="001">
                        <div class="page-header">
                            <h3 style="color: #ffffff">会议名称</h3>

                        </div>
                        <input class="form-control" name="name" id="name" placeholder="输入会议主题">
                    <a href="#002"><label class="btn btn-success" style="position: relative;left: 60%" >NEXT </label></a>
                </div>

            <div class="meet-item" style="top:1000px;" id="002">
                        <div class="page-header">
                            <h3 style="color: #ffffff">会议内容简介</h3>
                        </div>
                        <textarea style="width: 100%;height: 100px;" maxlength="512" name="detail" id="detail" placeholder="输入会议要点/简要明细">

                        </textarea>
                        <div class="form-group"style="position: relative;left: 60%"  >
                            <a href="#001"><label class="btn btn-success" > PRE</label></a>
                           <a href="#003"><label class="btn btn-success" >NEXT</label></a>
                        </div>

                </div>
            <div class="meet-item" style="top:1800px;" id="003">
                <div class="page-header">
                    <h3 style="color: #ffffff">选择参会人数</h3>
                </div>
                        <select class="form-control" name="num" id="num" onchange="getrooms();">
                            <option value="1">5-10</option>
                            <option value="2">10-25</option>
                            <option value="3">25-50</option>
                            <option value="4">50-75</option>
                            <option value="5">75-100</option>
                            <option value="6">>100</option>


                        </select>
                <div class="form-group"style="position: relative;left:60%"  >
                    <a href="#002"><label class="btn btn-success" > PRE</label></a>
                    <a href="#004" ><label class="btn btn-success" >NEXT</label></a>
                </div>



             </div>
            <div class="meet-item" style="top:2600px;" id="004">
            <div class="page-header">
                <h3 style="color: #ffffff">选择会议室</h3>
            </div>
            <select class="form-control" name="room" id="room" onchange="get_room_state()">





            </select>
            <div class="form-group"style="position: relative;left: 60%"  >
                <a href="#003"><label class="btn btn-success" > PRE</label></a>
                <a href="#005"><label class="btn btn-success" >NEXT</label></a>
            </div>




        </div>
            <div class="meet-item" style="top:3400px;" id="005">
                <div class="page-header">
                    <h3 style="color: #ffffff">选择会议时间</h3>
                </div>
                <select class="form-control" name="date" id="date">
                    <option value="1">明天</option>
                    <option value="2">后天</option>
                    <option value="3">大后天</option>
                </select>
                <table class="table" style="background-color: #ffffff">
                   <tr>

                 <td> <label><h4 >上午</h4></label></td>
                  <td>  <input type="radio" name="time" value="1" id="m1" >8:00-9:30</td>
                   <td> <input type="radio" name="time" value="2" id="m2"">10:00-11:30</td>
                   </tr>



                <tr>
                   <td> <label><h4 >下午</h4></label></td>
                    <td><input type="radio" name="time" value="3" id="a1">13:00-14:30</td>
                    <td><input type="radio" name="time" value="4" id="a2">15:00-16:30</td>
                    </tr>
                <tr>
                   <td> <label><h4 >晚上</h4></label></td>
                   <td> <input type="radio" name="time" value="5" id="e1">18:00-19:30</td>
                    <td><input type="radio" name="time" value="6" id="e2">20:00-12:30</td>
                    </tr>
                </table>
                <div class="form-group"style="position: relative;left:60%"  >
                    <a href="#004"><label class="btn btn-success" > PRE</label></a>
                    <a href="#006"><label class="btn btn-success" >NEXT</label></a>
                </div>

        </div>
            <div class="meet-item" style="top:4200px;" id="006">
                <div class="page-header">
                    <h3 style="color: #ffffff">选择参会人员</h3>

                </div>
                <table class="table table-bordered table-striped" style="background-color: #ffffff" id="person">
                    <tr>
                        <td> <label><h4 >姓名</h4></label></td>
                        <td><label><h4 >部门</h4></label></td>
                        <td><label><h4 >选择</h4></label></td>


                    </tr>



                </table>

                <div class="form-group"style="position: relative;left:60%"  >
                    <a href="#005"><label class="btn btn-success" > PRE</label></a>
                    <a href="#007"><label class="btn btn-success" >NEXT</label></a>
                </div>
            </div>
            <div class="meet-item" style="bottom: 100px" id="007">
                <div class="page-header">
                    <h3 style="color: #ffffff">确认预定</h3>

                </div>
                <div class="form-group" align="center" >
                    <button class="btn btn-default" type="submit"> Confirm</button>
                    <label class="btn btn-default"  onclick="back()" >Cancel</label>
                </div>
            </div>
        </form>
        </div>

        <script>
            function confirm_mes()
            {
                var txt=confirm("确认提交会议预定信息？");
                if(txt==true)
                {
                    return true;
                }
                else{
                    return false;
                }
            }
            function back()
            {
                document.location.href='./myspace.php';
            }

            </script>

</body>
</html>