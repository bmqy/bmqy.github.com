---
title: 'Android手机下输入框获取焦点时, 输入法挡住输入框bug的解决方法'
tags:
  - WeUI
  - 安卓input获得焦点
  - 输入法遮挡住input
id: 411
categories:
  - 清学小记
  - 燕衔春泥
abbrlink: 41298
date: 2016-09-07 14:38:05
---

```js
// Android 手机下输入框获取焦点时, 输入法会挡住输入框
// 相关 issue: https://github.com/weui/weui/issues/15
// 解决方法:
// 参考 http://stackoverflow.com/questions/23757345/android-does-not-correctly-scroll-on-input-focus-if-not-body-element
// Android 手机下, input 或 textarea 元素聚焦时, 主动滚动
if (/Android/gi.test(navigator.userAgent)) {
    window.addEventListener('resize', function () {
        if (document.activeElement.tagName == 'INPUT' || document.activeElement.tagName == 'TEXTAREA') {
            window.setTimeout(function () {
                document.activeElement.scrollIntoViewIfNeeded();
            }, 0);
        }
    })
}
```

摘自：[WeUI](https://weui.io/)