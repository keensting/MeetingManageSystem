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
        var code=(window.parent.code);
        var obj=(window.parent.obj);

        var data=obj[code];


    </script>



</head>
<input id="code" >
<body style="background-color: #ffffff">
<div class="container">
    <table style="width: 80%;height: 70%; position: absolute;left: 10%;top: 10%; border: 2px solid #ffffff"  >
        <caption>未来3天的使用情况</caption>
        <thead>
        <tr>
            <th></th>
            <th>第1天</th>
            <th>第2天</th>
            <th>第3天</th>

        </tr>

        </thead>

        <tbody>
        <tr  id="line1">
            <td>
                8:00-9:30
            </td>

            <script>
                for(var i=0;i<3;i++)
                {

                    if(data[i][0]==0)
                    {
                        window.document.getElementById("line1").innerHTML+='<td><label class="btn btn-success">free</label></td>'
                    }
                    else
                    {
                        window.document.getElementById("line1").innerHTML+='<td><label class="btn btn-danger">busy</label></td>'
                    }
                }
            </script>

        </tr>

        <tr  id="line2">
            <td>
                10:00-11:30
            </td>

            <script>
                for(var i=0;i<3;i++)
                {

                    if(data[i][1]==0)
                    {
                        window.document.getElementById("line2").innerHTML+='<td><label class="btn btn-success">free</label></td>'
                    }
                    else
                    {
                        window.document.getElementById("line2").innerHTML+='<td><label class="btn btn-danger">busy</label></td>'
                    }
                }
            </script>

        </tr>


        <tr  id="line3">
            <td>
               13:00-14:30
            </td>

            <script>
                for(var i=0;i<3;i++)
                {

                    if(data[i][2]==0)
                    {
                        window.document.getElementById("line3").innerHTML+='<td><label class="btn btn-success">free</label></td>'
                    }
                    else
                    {
                        window.document.getElementById("line3").innerHTML+='<td><label class="btn btn-danger">busy</label></td>'
                    }
                }
            </script>

        </tr>
        <tr  id="line4">
            <td>
               15:00-16:30
            </td>

            <script>
                for(var i=0;i<3;i++)
                {

                    if(data[i][3]==0)
                    {
                        window.document.getElementById("line4").innerHTML+='<td><label class="btn btn-success">free</label></td>'
                    }
                    else
                    {
                        window.document.getElementById("line4").innerHTML+='<td><label class="btn btn-danger">busy</label></td>'
                    }
                }
            </script>

        </tr>
        <tr  id="line5">
            <td>
               18:00-19:30
            </td>

            <script>
                for(var i=0;i<3;i++)
                {

                    if(data[i][4]==0)
                    {
                        window.document.getElementById("line5").innerHTML+='<td><label class="btn btn-success">free</label></td>'
                    }
                    else
                    {
                        window.document.getElementById("line5").innerHTML+='<td><label class="btn btn-danger">busy</label></td>'
                    }
                }
            </script>

        </tr>

        <tr  id="line6">
            <td>
               20:00-21:30
            </td>

            <script>
                for(var i=0;i<3;i++)
                {

                    if(data[i][5]==0)
                    {
                        window.document.getElementById("line6").innerHTML+='<td><label class="btn btn-success">free</label></td>'
                    }
                    else
                    {
                        window.document.getElementById("line6").innerHTML+='<td><label class="btn btn-danger">busy</label></td>'
                    }
                }
            </script>

        </tr>


        </tbody>
    </table>



</div>
</body>
</html>
