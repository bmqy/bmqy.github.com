---
title: dedecms增加新留言邮件提醒和后台留言管理模块
tags:
  - dedecms
  - 后台留言管理模块
  - 新留言发送邮件
id: 208
categories:
  - 清学小记
abbrlink: 24842
date: 2015-01-13 12:19:10
---

<span style="color: #0000ff;">本文记述为dedecms增加并完善留言邮件提醒、留言后台管理等相关功能。</span>

<span style="color: #0000ff;">1、增加邮箱格式验证并提示；</span>

<span style="color: #0000ff;">找到dedecms留言页“guestbook.php”文件，在需要进行验证的位置处加入以下代码（可按需修改）：</span>
```php
//验证邮箱
if ($email !=""){
    if(!eregi("^[a-z0-9_\-]+(\.[_a-z0-9\-]+)*@([_a-z0-9\-]+\.)+([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|int|jobs|mil|museum|name|nato|net|org|pro|travel)$",$email))
    {
        ShowMsg("<font color='red'>错误： E-Mail 地址有误!</font>","-1");
        exit();
    }
}
```
<span style="color: #0000ff;">2、留言成功发送邮件到指定邮箱地址：</span>

<span style="color: #0000ff;">找到dedecms留言页“guestbook.php”文件，在需要进行验证的位置处加入以下代码，引用时注意“$msg”变量的赋值变化，可按需更改：</span>
```php
//发送EMAIL
if($needCheck==1)
{
    require_once(DEDEINC."/oxwindow.class.php");
    $mailbody = '';
    $basehost = preg_replace("#http:\/\/#", '', $cfg_basehost);
    $mailtitle = "您的网站' $basehost '上有新留言";
    $mailbody .= "姓名：$uname \r\n";
    $mailbody .= "标题：$title \r\n";
    $mailbody .= "内容：$msg \r\n";
    $mailbody .= "E-mail：$email \r\n";
    $mailbody .= "Powered by http://www.bmqy.net ！";
    $headers = "From: ".$cfg_adminemail."\r\nReply-To: ".$cfg_adminemail;
    $email='bmqy@qq.com';//改为要接收邮件的邮箱
    if($cfg_sendmail_bysmtp == 'Y' &amp;&amp; !empty($cfg_smtp_server))
    {
        $mailtype = 'TXT';
        require_once(DEDEINC.'/mail.class.php');
        $smtp = new smtp($cfg_smtp_server,$cfg_smtp_port,true,$cfg_smtp_usermail,$cfg_smtp_password);
        $smtp-&gt;debug = false;
        $smtp-&gt;sendmail($email,$cfg_webname,$cfg_smtp_usermail,     $mailtitle, $mailbody, $mailtype);
    }
    else
    {
        @mail($email, $mailtitle, $mailbody, $headers);
    }
}
//发送EMAIL结束
```
<span style="color: #0000ff;">3、后台增加留言管理功能：</span>
  1) 首先下载附件
  2) 解压后得到2个文件guestbook.php和guestbook.htm
  3) 将guestbook.php文件 复制的 dede（后台管理目录）目录下
  4) 将guestbook.htm 文件 复制的dede/templets 目录下
  5) 进入织梦后台，模块->管理模块->留言簿模块->修改
  6) 找到安装程序，将里面的link链接改为guestbook.php
  7) 点击卸载留言簿模块，不要刷新，再安装一次该模块

该模块详细安装步骤步骤可参考：[增加dedecms后台留言管理功能](http://www.jb51.net/cms/134809.html "增加dedecms后台留言管理功能")。

再此附上本人修改过的版本，改善了查看留言页的样式排版，

[点此下载dedecms留言管理模块.zip](http://pan.baidu.com/s/1hquzZne "点此下载 dedecms留言管理模块.zip") 亦可自行按需更改。

附：查看留言页效果图：

![留言人提供邮箱地址时，显示回复邮件按钮](http://ww3.sinaimg.cn/large/4eed32f2jw1eo7sazsrbtj213x0l2whl.jpg "留言人提供邮箱地址时，显示回复邮件按钮") 
![留言人未提供邮箱地址时，只显示单击返回按钮](http://ww4.sinaimg.cn/large/4eed32f2jw1eo7sayofjkj21400l2ad4.jpg "留言人未提供邮箱地址时，只显示单击返回按钮") 