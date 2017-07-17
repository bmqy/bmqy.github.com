---
title: IE8使背景图片全屏显示的方法及问题
tags:
  - background-size
  - IE8背景全屏
  - sizingMethod
id: 322
categories:
  - 清学小记
abbrlink: 32419
date: 2015-07-23 17:18:44
---

IE8。。。

悲剧的，不支持css3的background-size属性，

通过网络，找到两种方法：

1、使用css滤镜
```css
filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=``'bg.jpg'``, sizingMethod=``'scale'``);
```
这个滤镜用的很纠结，当时用了一个div的嵌套，然后背景设置在顶层div上，结果用了这个滤镜后，将里层的a链接标签统统都挡住了，不能点击，连文字都不能选取，设置了z-index没用，<span style="color: #0000ff;">或许有其它解决方法，望各位高手告知</span>，有时间也会继续尝试其它方法。

2、使用img标签添加背景

这个方法虽然觉得不美观，但是用起来没有什么大麻烦，推荐使用：
```html
<img class="bg" src="bg.png"/>;
```

```css
.bg{
	position: "absolute";
	top:0;
	left:0;
	z-index:-1;
	width: 100%;
	height:150px;
}
```