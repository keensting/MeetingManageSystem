/*
创建xmlhttprequest
 */
function getXmlHttpRequest()
{
    var xmlhttp=null;
    try{
        xmlhttp=new XMLHttpRequest();//firefox

    }
    catch (e)
    {
        try{
            xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");//IE
        }
        catch (e)
        {
            try{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
                xmlhttp=false;
            }
        }
    }

    return xmlhttp;
}

/*
发送请求
 */
function sendRequest(url,call_back,data)
{
    var data=data||"";
    xmlHttp.onreadystatechange=call_back;
    if(data!="")
    {
        xmlHttp.open("POST",url,true);

        xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlHttp.setRequestHeader("Content-length",data.length);
        xmlHttp.setRequestHeader("Connection","close");
        xmlHttp.setRequestHeader("If-Modified-Since","0");
    }
    else{
        xmlHttp.open("GET",url,true);

    }
    xmlHttp.send(data);

}



function callBack()
{
    if(xmlHttp.readyState==4)
    {
        var response=xmlHttp.responseText;

        alert(response);
    }
}