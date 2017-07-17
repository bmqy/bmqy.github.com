---
title: wordpress在指定分类下的文章内容后显示自定义推广信息
tags:
  - wordpress
  - 指定分类下文章
  - 文章后自定义推广内容
id: 307
categories:
  - 清学小记
abbrlink: 28580
date: 2015-07-05 21:47:38
---

当网站需要在文章页的内容后显示一条推荐内容，而这条内容并不是需要在每个分类下的文章都显示的话，那么通过后台管理设置是最为方便的。

有了后台管理，可以随时更换推广内容，可以随意指定哪个分类下的文章显示推广内容，或者都显示。

那么准备工作如下：

1、有一个带主题选项的wordpress主题（在这里推荐一下本人在用的云落的git主题）；

2、找到主题设置项的php模板进行相关功能设置的添加；

3、找到文章页的php模板，添加对应的推广信息输出代码；

展示效果如：[燕坊清作](http://www.bmqy.net/yanfangqingzuo)，[清学小记](http://www.bmqy.net/qingsiyanxiang/qingxuexiaoji)，[仿站服务](http://www.bmqy.net/fangzhan)，只要有主题选项，添加起来还是很简单的。