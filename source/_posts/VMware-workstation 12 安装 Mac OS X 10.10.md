---
title: VMware-workstation 12 安装 Mac OS X 10.10
tags:
  - Mac OS
  - unlocker
  - VMware Workstation
id: 381
categories:
  - 清学小记
abbrlink: 50999
date: 2016-04-23 10:51:28
---

安装教程网上教程很多，这里只记录安装出现问题的解决方法。

1、VMware-workstation解锁mac os失败：

1）解决方法，删除“win-install.cmd”中如下选中内容；![解锁成功.png](http://ww1.sinaimg.cn/large/4eed32f2gw1f8n24gjgbxj20ck0hqjv6.jpg)

（借用图片说明问题，感谢网友）
2）安装[Python2.7.11](https://www.python.org/downloads/release/python-2711/)，在运行。

3）将“unlocker”解锁工具，放在“VMware Workstation”安装目录；

2、开启mac os虚拟镜像时弹出错误提示：![](http://www.myhack58.com/Article/UploadPic/2015-4/201544212649287.jpg)

（借用图片说明问题，感谢网友）

解决办法：找到虚拟镜像安装目录下的 类似“OS X 10.9.vmx”文件名的文件，使用记事本打开后在 smc.present = &quot;TRUE&quot; 后添加“smc.version = 0”，保存后重新开启镜像即可。

3、安装镜像时提示可用磁盘空间不足：

解决办法：返回上一步，选择导航菜单栏中“实用工具”下的“磁盘工具”，点击左边磁盘图标，选择“分区”后“抹掉”，然后关闭磁盘工具窗口，继续安装就可以了。

&nbsp;