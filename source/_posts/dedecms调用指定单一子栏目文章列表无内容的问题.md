---
title: dedecms调用指定单一子栏目文章列表无内容的问题
tags:
  - channelartlist
  - dedecms
  - 指定子栏目文章列表
id: 205
categories:
  - 清学小记
abbrlink: 10627
date: 2015-01-08 10:29:23
---

<span style="color: #0000ff;">dedecms调用指定栏目的文章列表方法为：</span>
<pre>{dede:channelartlist typeid="9"}
&lt;ul&gt;
    {dede:arclist titlelen='60' row='4' orderby='click'}
    &lt;li&gt;[field:textlink/]&lt;/li&gt;
    {/dede:arclist}
&lt;/ul&gt;
{/dede:channelartlist}</pre>
<span style="color: #0000ff;">但是刚在使用时发现，只有在id是顶级栏目的时候才会有文章列表出现，而换位任一子栏目时，结果却是空的，并无该有的子栏目文章列表出现。</span>

<span style="color: #0000ff;">于是查找dedecms代码，发现是这个“channelartlist”方法里的代码语句导致，原为：</span>
<pre>if(!preg_match('#,#', $typeid)) {
    $tpsql = " reid='$typeid' AND ispart&lt;&gt;2 AND ishidden&lt;&gt;1 ";
}
else {
    $tpsql = " id IN($typeid) AND ispart&lt;&gt;2 AND ishidden&lt;&gt;1 ";
}</pre>
<span style="color: #0000ff;">修改为以下代码，则调用指定任一子栏目文章列表显示正常：</span>
<pre>if(!preg_match('#,#', $typeid)) {
    $tpsql = " id IN($typeid) AND ispart&lt;&gt;2 AND ishidden&lt;&gt;1 ";
}
else {
    $tpsql = " id IN($typeid) AND ispart&lt;&gt;2 AND ishidden&lt;&gt;1 ";
}</pre>
<span style="color: #0000ff;">特此记录如下。</span>

<span style="color: #0000ff;">原创文章，如需转载请注明出处，thankyou！</span>