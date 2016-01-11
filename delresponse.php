<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="./js/jquery-1.8.0.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<?php
    include './parameter/mysql/DataOperat.php';
    include  './parameter/class/depart.php';
    $id= $_GET['id'];
session_start();
    $_SESSION['did']=$id;
    $mydb=new DataOperat();
    $re=$mydb->fetch_depart_info();
    $num=count($re);
?>

<body>
    <div class="container">
        <div class="page-header">
            <h3><strong>转移该部门的所有员工</strong></h3>
        </div>
        <form method="post" action="deal_del_depart_request.php" class="form col-md-8" >
            <div class="form-group ">
                 <label> 选择部门：</label>
                  <select class="form-control" id="depart" name="depart">
                      <?php
                      $row=new depart();
                      for($i=0;$i<$num;$i++) {
                          $row->initDepart($re[$i]);
                          if ($row->getId() != $id) {
                              ?>
                              <option value="<?php echo $row->getId();  ?>"><?php echo $row->getName();  ?></option>
                          <?php
                          }
                      }
?>




                </select>
              </div>


            <div class="form-group" align="center">
                <button type="submit" class="btn btn-primary">确定</button>
               <a href="./delDepart.php"> <button type="button" class="btn btn-default">取消</button></a>
            </div>
        </form>
    </div>

</body>
</html>