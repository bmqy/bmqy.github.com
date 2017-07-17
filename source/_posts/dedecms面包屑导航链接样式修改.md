---
title: dedecms面包屑导航链接样式修改
tags:
  - dedecms
  - 面包屑导航
id: 242
categories:
  - 清学小记
abbrlink: 33677
date: 2015-04-01 17:04:51
---

<span style="color: #0000ff;">1、去掉或替换面包屑导航中的栏目间隔符号“&gt;”；</span>

<del><span style="color: #0000ff;">方法：进入后台管理页面，进入系统→系统基本参数→核心设置→栏目位置的间隔符号，然后随便输入你喜欢的符号或者留空就可以了。</span></del>
**<span style="color: #0000ff;">注：上述方法会导致页面标题的栏目间隔符号被替换或为空，如果为空则页面标题因为没有间隔符而影响阅读。</span>**
**<span style="color: #0000ff;"> 请用以下方法：</span>**
<span style="color: #0000ff;">1）找到“include”目录里的“typelink.class.php”文件；</span>
<span style="color: #0000ff;">2）找到“function GetPositionLink($islink=true)”函数中的以下代码：</span>
```php
$this->valuePosition = $indexpage.$this->SplitSymbol.$this->valuePosition;
  return $this->valuePosition.$this->SplitSymbol;
```
<span style="color: #0000ff;">3）将上边代码修改成如下的样子，即：去掉“.$this->SplitSymbol”，此为间隔符号；</span>
```php
$this->valuePosition = $indexpage.$this->valuePosition;
  return $this->valuePosition;//去掉此处的“.$this->SplitSymbol”可以使当前栏目或页面后边不带间隔符号
```
<span style="color: #0000ff;"> 4）找到“function LogicGetPosition($id,$islink)”函数中的以下代码：</span>
```php
$this->valuePosition = $this->GetOneTypeLink($tinfos).$this->SplitSymbol.$this->valuePosition;
```
<span style="color: #0000ff;">5）同样去掉以上代码中的“.$this-&gt;SplitSymbol”即可完成修改。</span>

<span style="color: #0000ff;">2、修改面包屑导航的代码样式；</span>

<span style="color: #0000ff;">比如想要修改成带“li”列表的，或者去掉当前栏目或页面的超链接的，方法如下：</span>

<span style="color: #0000ff;">1）找到“include”目录里的“typelink.class.php”文件；</span>

<span style="color: #0000ff;">2）找到以下代码，然后修改成你想要的样子，比如加上“li”列表标签，或者去掉“a”超链接标签；</span>
```php
//获得某类目的链接列表 如：类目一&gt;&gt;类目二&gt;&gt; 这样的形式
//islink 表示返回的列表是否带连接
function GetPositionLink($islink=true)
{
	$indexpage = "<a href='".$this->indexUrl."'>".$this->indexName."</a>";
```
<span style="color: #0000ff;">PS：此处控制的是面包屑导航上层路径的标签；</span>

<span style="color: #0000ff;">3）继续找到以下代码，然后同样修改成你想要的样子，比如加上“li”列表标签，或者去掉“a”超链接标签；</span>
```php
//获得某个类目的超链接信息
function GetOneTypeLink($typeinfos){
	$typepage = $this->GetOneTypeUrl($typeinfos);
	$typelink = "<a href='".$typepage."'>".$typeinfos['typename']."</a>";
	return $typelink;
}
```
<span style="color: #0000ff;">以上代码可按需修改你想要的面包屑导航样式。</span>

**<span style="color: #0000ff;">原创文章转载请注明出处，thankyou！</span>**