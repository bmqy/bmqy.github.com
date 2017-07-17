---
title: 使用chrome浏览器调试移动端web页面
tags:
  - chrome浏览器
  - 安卓web调试
  - 微信页面
  - 移动web调试
id: 431
categories:
  - 清学小记
abbrlink: 7029
date: 2016-11-25 15:19:51
---

<span style="color: rgb(0, 112, 192);">貌似史上最详尽的一篇教程，步步详细、步步带图，啥也不说开始往下看吧</span><span style="color: rgb(0, 112, 192);">：</span>

<span style="color: rgb(0, 112, 192);"><span style="font-size: 12px;"><span style="font-size: 12px; color: rgb(255, 0, 0);">以下所说软件都指android版</span></span></span>

<span style="color: rgb(0, 112, 192);">1、电脑中安装chrome浏览器，最新版就好了；</span>

<span style="color: rgb(0, 112, 192);">2、手机中安装chrome浏览器，总之安装最新版就好了；</span>

<span style="color: rgb(0, 112, 192);">3、将手机用usb线连接至电脑；</span>

<span style="color: rgb(0, 112, 192);">3、打开电脑中chrome浏览器，F12键开启开发者工具；</span>

<span style="color: rgb(0, 112, 192);">4、开发者工具中依次点开“最右更多菜单”→“More tools”→“Remote devices”，看图：</span>

![QQ截图20161125145630.png](/uploads/2016/11/1480057203591808.png "1480057203591808.png")

<span style="color: rgb(0, 112, 192);">5、打开后开发者工具下面会看到“Remote devices”面板，并且可以看到已连接的手机设备，看图：</span>

![QQ截图20161125145921.png](/uploads/2016/11/1480057316714922.png "1480057316714922.png")

<span style="color: rgb(0, 112, 192);">6、手机中打开chrome浏览器，并浏览你想要调试的页面，本例打开百度首页，随便截张图：</span>

![Screenshot_2016-11-25-14-46-19.png](/uploads/2016/11/1480057550794329.png "1480057550794329.png")

<span style="color: rgb(0, 112, 192);">7、查看电脑端chrome浏览器开发者工具的“Remote devices”面板，会看到手机设备中已经打开的百度首页，看图：</span>

![QQ截图20161125150702.png](/uploads/2016/11/1480057765149522.png "1480057765149522.png")

<span style="color: rgb(0, 112, 192);">8、点击<span style="font-size: 14px; color: rgb(0, 112, 192);">“Remote devices”面板</span>右侧的“Inspect”按钮，即可开启chrome熟悉的调试工具，还有实时的预览图哦，看图：</span>

![QQ截图20161125144507.png](/uploads/2016/11/1480057830643776.png "1480057830643776.png")

<span style="color: rgb(0, 112, 192);">9、接下来能干点啥就不多说了。。。</span>

<span style="color:#0070c0"><span style="color: rgb(255, 0, 0);">PS：我不会告诉你们微信打开的web页面也是可以的，其它手机浏览器请自测</span></span>