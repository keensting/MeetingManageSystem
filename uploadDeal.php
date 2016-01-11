<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/6
 * Time: 16:01
 */

require_once './parameter/Medoo/Resource/medoo.php';
session_start();
$mid=$_SESSION['meetingid'];
$path='';
$name='';
//if (($_FILES["file"]["type"] == "doc/docx")
//        || ($_FILES["file"]["type"] == "ppt/pptx")
//        || ($_FILES["file"]["type"] == "txt")|| ($_FILES["file"]["type"] == "rar/zip")
//    ) {
    if ($_FILES['file']['error'] > 0) {
        echo "Error: " . $_FILES["file"]["error"];
    } else {
        if (file_exists("assert/docs/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " already exists. ";
        }
        else
        {
            $name=$_FILES['file']['name'];
            $path="./assert/docs/" . $_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"],
                "assert/docs/" . $_FILES["file"]["name"]);

        }

    }
//}
//else{
//    echo "文件不合法！";
//}

$type=$_POST['type'];

$db=new medoo('meetingmanage');

$did=$db->max('docspace','DOC_ID');
$did+=1;

$db->insert('docspace',array(
    'DOC_ID'=>$did,
    'MEETING_ID'=>$mid,
    'TYPE'=>$type,
    'DATE'=>date("Y/m/d"),
    'PATH'=>$path,
    'NAME'=>$name
));

?>
<html>
<head>

</head>
<body style="background:#ffffff">
<script type="text/javascript">
    alert('文件上传成功！')

</script>
    <meta http-equiv="refresh"  content="100;url='./mymeeting.php'"/>

</body>
</html>