---
title: 万网空间服务器上传网站后出现HTTP500.19错误
tags:
  - 500.19错误
  - 万网空间服务器
  - 唯一密钥属性“value”设置
id: 191
categories:
  - 燕衔春泥
abbrlink: 29511
date: 2014-12-26 14:02:44
---

在配置IIS7.5时，会出现在唯一密钥属性“value”设置为“default.aspx”（或者index.asp等）时，无法添加类型为“add”的重复集合项

1、报错情况

[![HTTP错误500.19](http://www.bmqy.net/uploads/2014/12/e1fe9925bc315c60bfb853a68eb1cb134954774d.jpg)](http://jingyan.baidu.com/article/20095761a4e051cb0721b41c.html)

2、添加了默认文档依然无妨正常访问网站

3、通过ftp工具，找到网站根目录的“web.config”文件，进行修改编辑：
<div class="content-list-text">
> 在&lt;files&gt;与&lt;/files&gt;之间加入代码
> 
> 
> &lt;clear /&gt;
> 
> 
> &lt;add value="index.php" /&gt;
> 
> 
> &lt;add value="Default.htm" /&gt;
> 
> 
> &lt;add value="index.htm" /&gt;
> 
> 
> &lt;add value="index.html" /&gt;
> 
> 
> &lt;add value="iisstart.htm" /&gt;
> 
> 
> &lt;add value="default.aspx" /&gt;
> 
> 
> （注意：上面的代码可根据你的网站首页文档类型来自己添加）
</div>

[![编辑“web.config”](http://www.bmqy.net/uploads/2014/12/bf096b63f6246b603b29893de8f81a4c510fa257.jpg)](http://jingyan.baidu.com/article/20095761a4e051cb0721b41c.html)

4、然后刷新就可以正常访问了。

通过[唯一密钥属性“value”设置…无法添加类型为add_百度经验](http://jingyan.baidu.com/article/20095761a4e051cb0721b41c.html).