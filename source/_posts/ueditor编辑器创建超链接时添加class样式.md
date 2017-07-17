---
title: ueditor编辑器创建超链接时添加class样式
tags:
  - ueditor
  - 添加class样式
  - 超链接
id: 190
categories:
  - 清学小记
abbrlink: 21335
date: 2014-12-18 13:05:16
---

在使用“ueditor”编辑文本时，为了在创建超链接时，给所有需要创建的链接加上同样的class样式，图方便不能每次都去html模式编辑，所以最好的办法就是在创建超链接时，有个选项：选择就添加class样式，否则就不添加。那么步骤如下：

1、打开ueditor编辑器目录“ueditor\dialogs\link”里的link.html文件；

2、找到以下3处代码并编辑：
```html
<tr>
     <td colspan=”2”>
         <label for=”target”><var id=”lang_input_target”></var></label>
         <input id=”target” type=”checkbox”/>
     </td>
</tr>
<!–此处编辑为你想要显示的信息  –>
<tr>
    <td colspan=”2”>
        <label for=”class”>添加class样式：</label>
        <input id=”class” type=”checkbox”/>
    </td>
</tr>
<!–此处编辑为你想要显示的信息  –>
<tr>
    <td colspan=”2” id=”msg”></td>
</tr>
```
```js
$G(“title”).value = url ? link.title : “”;
$G(“href”).value = url ? url: ‘’;
$G(“target”).checked = url && link.target == “_blank” ? true :  false;
//判断是否选中
$G(“class”).checked = url && link.className == “样式名” ? true :  false;
$focus($G(“href”));
```

```js
var obj = {
    'href' : href,
    'target' : $G('target').checked ? '_blank' : '_self',
    'title' : $G('title').value.replace(/^\s+|\s+$/g, ''),
    <!–选中则添加样式，否则不添加  –>
    'class' : $G('class').checked ? '样式名'' : ''
    <!–选中则添加样式，否则不添加  –>
};
```
3、编辑完成之后，打开demo.html，再创建超链接，就会有图中所示效果了。如果没有效果，请清空浏览器缓存后刷新再试。

![ueditor创建超链接时添加class样式](http://ww1.sinaimg.cn/large/4eed32f2jw1endqya2entj20li0e2q4o.jpg "ueditor创建超链接时添加class样式") 

![ueditor创建超链接时添加class样式](http://ww2.sinaimg.cn/large/4eed32f2jw1endqyc03x8j20rm08u75r.jpg "ueditor创建超链接时添加class样式") 

**<span style="color: #0000ff;">原创文章，转载请注明出处，thankyou。。。</span>**