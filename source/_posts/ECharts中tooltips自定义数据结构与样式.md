---
title: ECharts中tooltips自定义数据结构与样式
tags:
  - ECharts
  - ECharts的tooltips
  - tooltips自定义
id: 496
categories:
  - 清学小记
abbrlink: 48730
date: 2017-06-21 10:13:53
---

<font color=#0070c0>直接上代码：</font>
<font color=#0070c0>1、css样式代码</font>

```css
.myEchartsTooltips{
  width: 180px;
  padding: 0 !important;
  opacity: 0.8;
  border-radius: 5px !important;
  font-size: 12px !important;
  color: #666 !important; 
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
}
.myEchartsTooltips .echartsTooltipsWarp-head{
  padding: 5px 10px;
  background-color: #eee;
  border-bottom: 1px solid #e6e6e6;
  overflow: hidden;
}
.myEchartsTooltips .echartsTooltipsWarp-body{
  padding: 0 10px;
  background-color: #fff;
  overflow: hidden;
}
.myEchartsTooltips .echartsTooltipsWarp-body p{
  overflow: hidden;
  line-height: 30px;
}
```
<font color=#0070c0>2、js代码（<font color=red>主要是通过对dom的控制，实现数据结构与样式的自定义</font>）</font>

```js
tooltip: {
                trigger: 'axis',
                position: function (pos, params, dom, rect, size) {
                    console.log(params);
                    var sHtml = '';
                    var _tempHtml = '';
                    for(var i=0;i<params.length;i++){
                        var sName = params[i].name<10 ? '0' + params[i].name : params[i].name;
                        var iVal = params[i].value==0 ? '--' : params[i].value;
                        var sSeriesName = params[i].seriesName;

                        _tempHtml += '<p><span class="pull-left">'+ sSeriesName +'</span><span class="pull-right">'+ iVal +'</span></p>'
                    }
                    sHtml = '<div class="echartsTooltipsWarp-head"><span class="pull-left">'+ sName +':00 - '+ sName +':59 ' +'</span><span class="pull-right">'+ option.title.text +'</span></div><div class="echartsTooltipsWarp-body">'+ _tempHtml +'</div>';
                    $(dom).addClass('myEchartsTooltips').html(sHtml);// 通过对dom的控制，实现数据结构与样式的自定义
                }
            },
```