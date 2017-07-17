---
title: AspCms在子菜单栏目后面显示产品数量或新闻数量的解决办法
tags:
  - aspcms
  - 调用栏目中文章数量
id: 206
categories:
  - 燕衔春泥
abbrlink: 56035
date: 2015-01-11 14:09:05
---

有时候我们需要在产品栏目后面显示出该栏目下有多少产品，或者新闻栏目下有多少条新闻。例如子页面导航为产品总分类（18）产品分类一（10）产品分类二（3）产品分类三（5）数字代表该栏目下有多少产品。以下内容是模拟显示产品数量的解决办法。
此文仅提供解决思路，如果使用以下代码有问题，还需自行修改。
打开inc/AspCms_MainClass.asp在479行左右找到
```php
for each matchfield in matchesfield
fieldNameAndAttr=regExpReplace(matchfield.SubMatches(0),"[\s]+",chr(32))
fieldNameAndAttr=trimOuter(fieldNameAndAttr)
m=instr(fieldNameAndAttr,chr(32))
if m > 0 then 
fieldName=left(fieldNameAndAttr,m - 1)
fieldAttr = right(fieldNameAndAttr,len(fieldNameAndAttr) - m)
else
fieldName=fieldNameAndAttr
fieldAttr = ""
end if
```
在下面加入
```php
dim selsortid,contotal,contype,newstotal,prototal,downtotal,pictotal,total
selsortid=linkArray(3,i)
set contype=conn.Exec("select sortType from {prefix}Sort where sortID="&selsortid,"r1")
set contotal=conn.Exec("select count (*) from {prefix}Content where sortID="&selsortid,"r1")
if contype(0)=1 or contype(0)=7 then 
 alertMsgAndGo contype(0),"-1"
else
set total=conn.Exec("select count (*) from {prefix}Content as c,{prefix}Sort as s where c.sortID="&selsortid&" and c.sortid=s.sortid and s.sortType="&contype(0),"r1")
end if
if contype(0)=2 then 
newstotal=total(0)
elseif contype(0)=3 then 
prototal=total(0)
elseif contype(0)=4 then 
downtotal=total(0)
elseif contype(0)=6 then 
pictotal=total(0)
end if
```
然后在select case fieldName里面加入
```php
case "total"
loopstrLinklistNew=replaceStr(loopstrLinklistNew,matchfield.value,contotal(0))
case "newstotal"
loopstrLinklistNew=replaceStr(loopstrLinklistNew,matchfield.value,newstotal)
case "prototal"
loopstrLinklistNew=replaceStr(loopstrLinklistNew,matchfield.value,prototal)
case "downtotal"
loopstrLinklistNew=replaceStr(loopstrLinklistNew,matchfield.value,downtotal)
case "pictotal"
loopstrLinklistNew=replaceStr(loopstrLinklistNew,matchfield.value,pictotal)
```
前台调用代码在各页面的栏目循环中加入：新闻：[navlist:newstotal] 产品：[navlist:prostotal] 下载：[navlist:downtotal] 图片：[navlist:pictotal] 不区分分类[navlist:total]

通过[AspCms在子菜单栏目后面显示产品数量或新闻数量的解决办法_乐知心觉_新浪博客](http://blog.sina.com.cn/s/blog_4a64b49c0101f3g8.html).