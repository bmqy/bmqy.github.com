---
title: wordpress重新安装出现“wordpress database error，can't find file”错误
tags:
  - can't find file
  - wordpress
  - wordpress database error
id: 246
categories:
  - 清学小记
abbrlink: 15098
date: 2015-04-05 15:37:01
---

![wordpress database error.can](http://ww4.sinaimg.cn/large/4eed32f2jw1equpzcieakj20l60jmair.jpg "wordpress database error.can't find file") 

<span style="color: #0000ff;">今天心血来潮，重新安装了wordpress，结果安装时候各种报错，最头疼的就是这个“wordpress database error，can't find file”。</span>

<span style="color: #0000ff;">网上各种搜罗，就是没说wordpress怎么搞定的，后来发现一篇关于mysql什么什么错误的文章，里边有一句说到重启mysql服务的。</span>

<span style="color: #0000ff;">然后一想，这个错误就是跟数据库有关，也就是和mysql有关系，而且它也有个服务项，于是关掉“mysql服务”，为了保险还重启了电脑，再重新安装wordpress，好了，整个世界终于清静了。</span>