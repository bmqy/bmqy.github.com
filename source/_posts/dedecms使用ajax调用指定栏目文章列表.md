---
title: dedecms使用ajax调用指定栏目文章列表
tags:
  - ajax更新文章列表
  - ajax调用指定栏目文章
  - dedecms
id: 297
categories:
  - 清学小记
  - 燕衔春泥
abbrlink: 17150
date: 2015-07-03 12:26:21
---

打开或复制一份plus目录下的list.php文件，在require_once(dirname(__FILE__)."/../include/common.inc.php");
这段代码后加入以下代码：
```php
if(isset($_GET['ajax'])){
  $typeid = isset($_GET['typeid']) ? intval($_GET['typeid']): 0;//传递过来的分类ID
  $page = isset($_GET['page']) ? intval($_GET['page']): 0;//页码
  $pagesize = isset($_GET['pagesize']) ? intval($_GET['pagesize']): 15;//每页多少条，也就是一次加载多少条数据
  $start = $page>0 ? ($page-1)*$pagesize : 0;//数据获取的起始位置。即limit条件的第一个参数。
  $typesql = $typeid ? " WHERE typeid='$typeid" : '';//这个是用于首页实现瀑布流加载，因为首页加载数据是无需分类的，所以要加以判断，如果无需
   $total_sql = "SELECT COUNT(id) as num FROM '#@__archives'  $typesql ";
  $temp = $dsql->GetOne($total_sql);
  $total = 0;//数据总数
  $load_num =0;
  if(is_array($temp)){
    $load_num= round(($temp['num']-15)/$pagesize);//要加载的次数,因为默认已经加载了
    $total = $temp['num'];
  }
  $sql = "SELECT a.*,t.typedir,t.typename,t.isdefault,t.defaultname,t.namerule, t.namerule2,t.ispart, t.moresite,t.siteurl,t.sitepath FROM '#@__archives' as a JOIN '#@__arctype' AS t ON a.typeid=t.id $typesql ORDER BY id DESC LIMIT $start,$pagesize";
   $dsql->SetQuery($sql);
    $dsql->Execute('list');
   $statu = 0;//是否有数据，默认没有数据
   $data = array();
}
```

```php
$index = 0;
while($row = $dsql->GetArray("list")){
    $row['info'] = $row['info'] = $row['infos'] = cn_substr($row['description'],160);
     $row['id'] =  $row['id'];
     $row['filename'] = $row['arcurl'] = GetFileUrl($row['id'],$row['typeid'],$row['senddate'],$row['title'],$row['ismake'],
  $row['arcrank'],$row['namerule'],$row['typedir'],$row['money'],$row['filename'],$row['moresite'],$row['siteurl'],$row['sitepath']);
   $row['typeurl'] = GetTypeUrl($row['typeid'],$row['typedir'],$row['isdefault'],$row['defaultname'],$row['ispart'],
   $row['namerule2'],$row['moresite'],$row['siteurl'],$row['sitepath']);
  if($row['litpic'] == '-' || $row['litpic'] == ''){
      $row['litpic'] = $GLOBALS['cfg_cmspath'].'/images/defaultpic.gif';
   }
    if(!preg_match("#^http:\/\/#i", $row['litpic']) &&$GLOBALS['cfg_multi_site'] == 'Y'){
    $row['litpic'] = $GLOBALS['cfg_mainsite'].$row['litpic'];
   }
  $row['picname'] = $row['litpic'];//缩略图
   $row['stime'] = GetDateMK($row['pubdate']);
  $row['typelink'] = "<a href='".$row['typeurl']."'>".$row['typename']."</a>";//分类链
  $row['fulltitle'] = $row['title'];//完整的标题
  $row['title'] = cn_substr($row['title'], 60);//截取后的标题
   $data[$index] = $row;
   $index++;
}
if(!empty($data)){
$statu = 1;//有数据
}
$result =array('statu'=>$statu,'list'=>$data,'total'=>$total,'load_num'=>$load_num);
echo json_encode($result);//返回数据
exit();
```
以上代码摘自：[百度经验](http://jingyan.baidu.com/article/90808022d33ba2fd91c80fbb.html)

js代码输出获取到的内容：
```js
$('.btn').on("click",function(){
	$("#content-box").hide();
	$("#content-box").html("数据加载中...");
	$("#content-box").show();
	var htmlobj=  $.ajax({
		url:"/plus/list.php?tid="+$(this).attr("data-typeid"),
		async:false
		});
	$("#content-box").html(htmlobj.responseText);
});
```