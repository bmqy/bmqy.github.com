---
title: ASP解析JSON的方法
tags:
  - asp
  - asp解析json
  - json
id: 464
categories:
  - 燕衔春泥
abbrlink: 55444
date: 2017-02-21 17:04:52
---

使用ASP解析 JSON，

第一个方法是使用&nbsp;JScript ：
```vb 
<script language="jscript" runat="server">  
    Array.prototype.get = function(x) { return this[x]; };  
    function parseJSON(strJSON) { return eval("(" + strJSON + ")"); }  
</script>  
    <%  
    Dim json, obj  
    json = "{a:""aaa"", b:{ name:""bb"", value:""text"" }, c:[""item0"", ""item1"", ""item2""]}"  
    Set obj = parseJSON(json)  
       
    Response.Write obj.a & "<br />"  
    Response.Write obj.b.name & "<br />"  
    Response.Write obj.c.length & "<br />"  
    Response.Write obj.c.get(0) & "<br />"  
       
    Set obj = Nothing  
    %>
```
第二个方法是使用MS的脚本控件（也一样是使用了 JScript）：
```vb
Dim scriptCtrl  
    Function parseJSON(str)  
        If Not IsObject(scriptCtrl) Then  
            Set scriptCtrl = Server.CreateObject("MSScriptControl.ScriptControl")  
            scriptCtrl.Language = "JScript"  
            scriptCtrl.AddCode "Array.prototype.get = function(x) { return this[x]; }; var result = null;"  
        End If  
        scriptCtrl.ExecuteStatement "result = " & str & ";"  
        Set parseJSON = scriptCtrl.CodeObject.result  
    End Function  
       
    Dim json  
    json = "{a:""aaa"", b:{ name:""bb"", value:""text"" }, c:[""item0"", ""item1"", ""item2""]}"  
       
    Set obj = parseJSON(json)  
       
    Response.Write obj.a & "<br />"  
    Response.Write obj.b.name & "<br />"  
    Response.Write obj.c.length & "<br />"  
    Response.Write obj.c.get(0) & "<br />"  
       
    Set obj = Nothing  
       
    Set scriptCtrl = Nothing
```
以上内容摘自：http://json.tongxiehui.net/?post/fu41ub.html