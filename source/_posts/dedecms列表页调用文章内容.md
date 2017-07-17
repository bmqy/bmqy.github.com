---
title: dedecms列表页调用文章内容
tags:
  - dedecms
  - 列表附加字段
  - 列表页调用文章内容
  - 模型字段配置
id: 185
categories:
  - 清学小记
abbrlink: 55802
date: 2014-12-11 16:37:50
---

dedecms在列表页调用文章内容的方法如下：

1、依次打开“核心”→“频道模型”→“内容模型管理”；

2、打开你需要调用文章内容的模型分类，例如“分类信息”；

3、点开后默认显示的是“基本设置”页面，里面有一行显示的是“列表附加字段”请注意；

4、接下来点开“字段管理”页面，其中有一条“信息内容”的字段配置信息，复制其数据字段名；

[caption id="" align="alignnone" width="1195"]![dedecms字段管理字段配置](http://ww1.sinaimg.cn/large/4eed32f2jw1en5tpfvskyj20x70ipgq7.jpg) dedecms字段管理字段配置[/caption]

4、复制字段名后再返回“基本设置”页面，在“列表附加字段”的输入框里添加上那个字段名，之后就可以像调用标题一样调用文章内容了；

[caption id="" align="alignnone" width="1196"]![dedecms内容模型管理列表附加字段](http://ww3.sinaimg.cn/large/4eed32f2jw1en5tpetmmlj20x80ipae6.jpg) dedecms内容模型管理列表附加字段[/caption]

5、需要控制显示字数的话，可以使用此代码：
<pre>[field:body function="cn_substr(html2text(@me),30)"/]</pre>