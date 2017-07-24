---
title: php-5.5.14+Apache-2.4.9+xDebug安装配置
tags:
  - apache2.4.9
  - php5.5.14
  - xdebug安装
id: 68
categories:
  - 燕衔春泥
abbrlink: 41872
date: 2014-07-08 15:18:15
---

<span style="color: #0000ff;">这两天各种尝试、各种不行，各种再尝试、各种再不行，终于，今天搞好了，特此记录一下：</span>

1、下载好需要的[php-5.5.14（win32）](http://windows.php.net/download/)和[Apache2.4.9（win32）](http://www.apachelounge.com/download/)以及[xDebug](http://xdebug.org/download.php)对应版本（php_xdebug-2.2.5-5.5-vc11.dll）；

2、php-5.5.14解压到指定目录后，复制一份“php.ini-development” 并重新命名为“php.ini”；

3、打开“php.ini”在其最后添加如下内容：
> [Xdebug]> 
> zend_extension = "D:/Program Files/php/ext/php_xdebug-2.2.5-5.5-vc11.dll"> 
> xdebug.auto_trace = On> 
> xdebug.remote_autostart = On> 
> xdebug.remote_enable = on> 
> xdebug.remote_host = localhost> 
> xdebug.remote_port = 9000> 
> ;xdebug.remote_mode = req> 
> ;xdebug.remote_handler = dbgp> 
> ;xdebug.profiler_enable = on> 
> ;xdebug.profiler_enable_trigger = off> 
> ;xdebug.profiler_output_name = cachegrind.out.%t.%p> 
> ;工作目录> 
> ;xdebug.profiler_output_dir = "D:/develop/php-5.5.9/tmp"
3、修改Apache2.4目录中的“httpd.conf”文件，添加如下内容：
> #BEGIN PHP INSTALLER EDITS - REMOVE ONLY ON UNINSTALL> 
> PHPIniDir "D:/Program Files/php"> 
> LoadFile "D:/Program Files/php/php5ts.dll"> 
> LoadModule php5_module "D:/Program Files/php/php5apache2_4.dll"> 
> #END PHP INSTALLER EDITS - REMOVE ONLY ON UNINSTALL> 
> &lt;IfModule mod_php5.c&gt;> 
> AddType application/x-httpd-php .php> 
> AddType application/x-httpd-php .php3> 
> AddType application/x-httpd-php-source .phps> 
> &lt;/IfModule&gt;
4、建立包含如下内容的php页面，测试“xDebug”是否安装成功：
> &lt;?php> 
> phpinfo();> 
> ?&gt;
[caption id="" align="alignnone" width="717"]![xDebug安装成功](http://ww1.sinaimg.cn/large/4eed32f2jw1ei5esegxwaj20jx0fq0uf.jpg) xDebug安装成功[/caption]

&nbsp;

感谢“[hzhxxx](http://blog.csdn.net/hzhxxx/article/details/19614551)”的分享文章。