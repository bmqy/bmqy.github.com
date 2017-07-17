---
title: wordpress添加twentysixteen子主题
tags:
  - twentysixteen
  - wordpress
  - 子主题
id: 435
categories:
  - 清学小记
abbrlink: 21156
date: 2016-12-05 21:39:03
---

<span style="color: rgb(0, 112, 192);">1、自定义标签云显示：</span>

<span style="color: rgb(0, 112, 192);">将以下代码粘贴到对应子主题的“function.php”中，代码亦可参考原主题“function.php”文件中代码。</span>

<span style="color: rgb(0, 112, 192);">对应属性作用可百度找到</span>
```php
/*&nbsp;自定义标签云&nbsp;*/
function&nbsp;bmqy_widget_tag_cloud_args(&nbsp;$args&nbsp;)&nbsp;{
&nbsp;&nbsp;&nbsp;&nbsp;$args[&#39;largest&#39;]&nbsp;=&nbsp;1;
&nbsp;&nbsp;&nbsp;&nbsp;$args[&#39;smallest&#39;]&nbsp;=&nbsp;1;
&nbsp;&nbsp;&nbsp;&nbsp;$args[&#39;unit&#39;]&nbsp;=&nbsp;&#39;em&#39;;
&nbsp;&nbsp;&nbsp;&nbsp;$args[&#39;orderby&#39;]&nbsp;=&nbsp;&#39;id&#39;;
&nbsp;&nbsp;&nbsp;&nbsp;$args[&#39;order&#39;]&nbsp;=&nbsp;&#39;RAND&#39;;
&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$args;
}
add_filter(&nbsp;&#39;widget_tag_cloud_args&#39;,&nbsp;&#39;bmqy_widget_tag_cloud_args&#39;&nbsp;);
```

<span style="color: rgb(255, 0, 0);">PS：如有其它需要，本篇可能会不定期更新</span>