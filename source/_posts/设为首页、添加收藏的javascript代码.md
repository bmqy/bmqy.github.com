---
title: 设为首页、添加收藏的javascript代码
tags:
  - javascript
  - 添加收藏
  - 设为首页
id: 327
categories:
  - 清学小记
abbrlink: 53740
date: 2015-07-28 21:22:42
---

```js
//加入收藏
function AddFavorite() {
sTitle = window.location.href;
sURL = encodeURI(window.location.href);
try{
window.external.addFavorite(sURL, sTitle);
}catch(e) {
try{
window.sidebar.addPanel(sTitle, sURL, "");
}catch (e) {
alert("加入收藏失败，请使用Ctrl+D进行添加,或手动在浏览器里进行设置.");
}
}
}

//设为首页
function SetHome(){
var url = window.location.href;
if (document.all) {
document.body.style.behavior='url(#default#homepage)';
document.body.setHomePage(url);
}else{
alert("您好,您的浏览器不支持自动设置页面为首页功能,请您手动在浏览器里设置该页面为首页!");
}
}
```

```html
<a class=”shou” onclick="AddFavorite();">添加收藏</a>

<a class=”home” onclick="SetHome();">设为首页</a>
```