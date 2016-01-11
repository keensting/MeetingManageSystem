<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/6
 * Time: 17:11
 */
session_start();
session_destroy();
?>
<html>
<head>
    <title>注销...</title>
</head>
<body>
    <script type="text/javascript">
        alert("已注销。。");
    </script>
    <meta http-equiv="refresh" content="1;url='./welcome.html'" >
</body>
</html>