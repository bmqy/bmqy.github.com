---
title: dedecms更换html编辑器为ueditor
tags:
  - dedecms
  - html编辑器
  - ueditor
id: 187
categories:
  - 清学小记
abbrlink: 52133
date: 2014-12-12 16:00:23
---

<span style="color: #0000ff;">网上试了好多代码，终于找到这一段成功了，留存一下：</span>
```php
else if($GLOBALS['cfg_html_editor']=='ueditor')
    {
        $fvalue = $fvalue=='' ? '<p></p>' : $fvalue;
        $code = '<script type="text/javascript" charset="utf-8" src="'.$GLOBALS['cfg_cmspath'].'/include/ueditor/ueditor.config.js"></script>';
        $code .= '<script type="text/javascript" charset="utf-8" src="'.$GLOBALS['cfg_cmspath'].'/include/ueditor/ueditor.all.min.js"></script>';
        $code .= '<link rel="stylesheet" type="text/css" href="'.$GLOBALS['cfg_cmspath'].'/include/ueditor/themes/default/css/ueditor.css"/>';
        //$code .= '<textarea name="'.$fname.'" id="'.$fname.'" style="width:100%;">'.$fvalue.'</textarea>';
        $code .= '<script type="text/plain" name="'.$fname.'" id="'.$fname.'">'.$fvalue.'</script>';
        if($bbcode)
        {
            $code .= '<script type="text/javascript">UE.getEditor("'.$fname.'",{toolbars:[["Source","|",
        "bold", "italic", "underline","|","fontsize","forecolor","emotion","Undo", "Redo"]],initialFrameHeight:100});</script>';
        }
        else
        {
            $code .= '<script type="text/javascript">UE.getEditor("'.$fname.'",{initialFrameHeight:450});</script>';
        }          
  
        if($gtype=="print")
        {
            echo $code;
        }
        else
        {
            return $code;
        }
    }//bd end
```
<span style="color: #0000ff;">替换步骤也简单记录一下：</span>

<span style="color: #0000ff;">1、下载ueditor并改好名字放在dedecms的“include”目录；</span>

<span style="color: #0000ff;">2、修改include目录中“inc”目录里的“inc_fun_funAdmin.php”文件，找到“获取编辑器”段的函数“SpGetEditor”代码，在其“else”前添加如上代码；</span>

<span style="color: #0000ff;">3、进入dedecms后台→系统→系统基本参数→核心设置，修改html编辑器的名字为ueditor。</span>