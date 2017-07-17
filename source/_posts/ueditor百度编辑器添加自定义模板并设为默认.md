---
title: ueditor百度编辑器添加自定义模板并设为默认
tags:
  - ueditor
  - 自定义模板
  - 默认模板
id: 394
categories:
  - 清学小记
abbrlink: 9234
date: 2016-05-28 16:07:09
---

ueditor百度编辑器，添加自定义模板并设置为默认模板，方法步骤如下：

1、找到ueditor目录下“”的“config.js”文件，按照已有模板结构添加自己的模板；

2、再修改语言文件目录“ueditor\lang\”的对应语言文件，添加自己的模板名字；

3、在“ueditor\dialogs\template”目录里找到“template.js”文件，将最后的“pre(2)”中的数字改为你的自定义模板的序号；

4、完成以上步骤即可将添加的自定义模板设置默认模板。

**<span style="color: #0000ff;">注：原创文章如需转载，请注明出处，thankyou</span>**