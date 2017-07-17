---
title: dedecms清空所有文章且以后新建文章ID从1开始
tags:
  - dedecms
  - ID重新从1编号
  - 清空文章
id: 188
categories:
  - 清学小记
abbrlink: 2658
date: 2014-12-17 13:46:13
---

首先登录织梦后台，找到“系统”→“系统设置”→“SQL命令行工具”分别运行：

清除表中的数据，删除所有文章：

truncate table `dede_arctiny`;

truncate table `dede_archives`;

truncate table `dede_addonarticle`;

truncate table `dede_addoninfos`;

新发布文章ID从1开始：

ALTER TABLE `dede_arctype` AUTO_INCREMENT =1;

ALTER TABLE `dede_addoninfos` AUTO_INCREMENT =1;

然后再发布文章id都是从1开始了。

通过[DEDECMS清空所有文章且以后新建文章ID从1开始_百度经验](http://jingyan.baidu.com/article/67508eb4d015e39cca1ce41f.html).