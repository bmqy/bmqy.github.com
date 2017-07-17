---
title: js获取鼠标当前所在页面位置
tags:
  - js获取鼠标坐标
  - 鼠标在页面中的位置
id: 199
categories:
  - 燕衔春泥
abbrlink: 42657
date: 2014-12-26 17:15:31
---

```js
//此方法对于嵌套在一个页面A中的B页面，获取B页面的位置在IE9和其他浏览器（包括IE其他系列浏览器）下有些不同，IE9是根据浏览器来定位的，FF及其他则是根据当前页面也就是嵌套的页面来定位的（真正兼容还待改进）

　　　　function getEvent() //同时兼容ie和ff的写法
        {
            if (document.all)
                return window.event;
            func = getEvent.caller;
            while (func != null) {
                var arg0 = func.arguments[0];
                if (arg0) {
                    if ((arg0.constructor == Event || arg0.constructor == MouseEvent) || (typeof (arg0) == "object" && arg0.preventDefault && arg0.stopPropagation)) {
                        return arg0;
                    }
                }
                func = func.caller;
            }
            return null;
        }
        var __is_ff = (navigator.userAgent.indexOf("Firefox") != -1); //Firefox 
        function getMouseLocation() {
            var e = getEvent();
            var mouseX = 0;
            var mouseY = 0;
            if (__is_ff) {
                mouseX = e.layerX + document.body.scrollLeft;
                mouseY = e.layerY + document.body.scrollLeft;
            }
            else {
                mouseX = e.x + document.body.scrollLeft;
                mouseY = e.y + document.body.scrollTop;
            }
            return { x: mouseX, y: mouseY };
        }
        //调用的方法，弹出当前所在页面的位置
        function show() {
            var test = getMouseLocation();
            alert(test.x + ":" + test.y);
        }
```
[js获取鼠标当前所在页面位置 - wboweb - 博客园](http://www.cnblogs.com/wangbogo/archive/2012/08/23/2651841.html).