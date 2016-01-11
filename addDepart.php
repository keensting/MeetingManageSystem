<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script>
        function check()
        {
            var name=document.getElementById('name').value;
            var phone=document.getElementById('phone').value;
            var info=document.getElementById('info').value;
            if(name==''||phone==''||info=='')
            {
                alert('部门信息不完整！');
                return false;
            }
            else{
                return true;
            }
        }
    </script>
    <?php
        include './parameter/Medoo/Resource/medoo.php';
        $name='';
        $describe='';
        $phone='';
        if(!$_POST)
        {

        }
    else{
        $db=new medoo('meetingmanage');
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $describe=$_POST['info'];
        $did=$db->max('departs','DEPART_ID');
        $did+=1;//depart id
        $db->insert('departs',array(
            'DEPART_ID'=>$did,
            'NAME'=>$name,
            'PHONE'=>$phone,
            'INSTRUCTION'=>$describe
        ));
        ?>
        <script>
            alert("添加成功！");
            document.location.href='./addDepart.php';
        </script>
    <?php
    }
    ?>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h3><strong>添加部门</strong></h3>
        </div>
        <form class="col-md-8" method="post" action="addDepart.php"  onsubmit="return check();">
            <fieldset class="form-horizontal" >
                <legend>填写部门信息</legend>
                <div class="form-group">
                    <label for="name" class="col-md-2 control-label">名称：</label>
                    <div class="col-md-8">
                        <input type="text" id="name" name="name" placeholder="部门名称" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-2 control-label" >电话：</label>
                    <div class="col-md-8">
                        <input  id="phone" name="phone" placeholder="部门电话" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-2 control-label">简介：</label>
                    <div class="col-md-8">
                        <textarea  id="info" name="info" placeholder="部门描述信息" class="form-control" style="height: 100px;"rows="10" />
                        </textarea>
                    </div>
                </div>



            </fieldset>
            <div class="text-center form-group">
                <button type="reset" class="btn btn-default">重置</button>
                <button type="submit" class="btn btn-success" >添加</button>
            </div>
        </form>
    </div>

</body>
</html>