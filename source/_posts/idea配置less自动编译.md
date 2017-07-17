---
title: idea配置less自动编译
tags:
  - idea
  - less
  - 自动编译less
id: 433
categories:
  - 清学小记
abbrlink: 55120
date: 2016-12-01 18:32:13
---

<span style="color: rgb(0, 112, 192);">idea配置less自动编译：</span>

<span style="color: rgb(0, 112, 192);">1、电脑安装node.js环境；
</span>

<span style="color: rgb(0, 112, 192);">2、打开“idea”→“settings”→“plugins”安装：“nodejs”插件，并按以下步骤进行配置：</span>

![QQ截图20161201180843.png](/uploads/2016/12/1480587751120337.png "1480587751120337.png")

<span style="color: rgb(0, 112, 192);">&nbsp;&nbsp;&nbsp;&nbsp;1）打开“idea”→“settings”→“Languages &amp; Frameworks”→“Node.js and NPM”；</span>

<span style="color: rgb(0, 112, 192);">&nbsp;&nbsp;&nbsp;&nbsp;2）在打开的面板中点击右侧“+”加号按钮添加需要的“less”组件（如果此处不能添加，请使用npm命令进行全局安装）。</span>

![QQ截图20161201181901.png](/uploads/2016/12/1480587698818312.png "1480587698818312.png")

<span style="color: rgb(0, 112, 192);">3、打开“idea”→“settings”→“plugins”安装：“file watchers”插件，并按以下步骤进行设置：</span>

![QQ截图20161201180935.png](/uploads/2016/12/1480587731788935.png "1480587731788935.png")

<span style="color: rgb(0, 112, 192);">&nbsp;&nbsp;&nbsp;&nbsp;1）打开“idea”→“settings”→“tools”→“file watchers”；</span>

<span style="color: rgb(0, 112, 192);">&nbsp;&nbsp;&nbsp;&nbsp;2）在打开的面板中点击右侧加号按钮添加less配置，貌似插件自动就配置好了，如无配置，请参考《</span>[webstorm10配置less编译环境](http://www.bmqy.net/362.html "http://www.bmqy.net/362.html")<span style="color: rgb(0, 112, 192);">》。
</span>

<span style="color: rgb(0, 112, 192);">3、安装</span>[LESS CSS Compiler](http://www.bmqy.net/430.html "LESS CSS Compiler")<span style="color: rgb(0, 112, 192);">插件，安装完成后无需进行任何配置；</span>

<span style="color: rgb(0, 112, 192);">4、以上步骤成功后，编辑less文件即可自动编译成css文件。</span>