---
title: sublime自动编译less2css插件，保存时提示系统找不到指定文件
tags:
  - less2css
  - sublime
  - 系统找不到指定文件
id: 428
categories:
  - 清学小记
  - 燕衔春泥
abbrlink: 43396
date: 2016-11-22 12:25:20
---

重新安装sublime并装好所有需要的插件后，编译less文件，保存时竟然提示“系统找不到指定文件”，

![QQ截图20161122114816.png](/uploads/2016/11/1479788521967412.png "1479788521967412.png")

解决方如下：

1、下载[less.js-windows](https://github.com/duncansmart/less.js-windows)，放到你本地磁盘中；

2、在系统变量path中添加“less.js-windows”的文件目录（可参考[Sublime Text 3的Less2Css插件介绍与安装](http://www.daqianduan.com/6033.html "Sublime Text 3的Less2Css插件介绍与安装")）；

3、如果以上步骤成功，问题解决。