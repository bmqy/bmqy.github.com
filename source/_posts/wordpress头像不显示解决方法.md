---
title: wordpress头像不显示解决方法
tags:
  - gravatar头像
  - wordpress头像
id: 396
categories:
  - 燕衔春泥
abbrlink: 58290
date: 2016-06-04 21:59:11
---

使用Gravatar的HTTPS（适用于任何主题）：

在主题目录中，找到并打开 functions.php 文件，把以下代码复制放到该文件中：

```php
function mywp_get_https_avatar($avatar) {
$avatar = preg_replace('<span style="color: #0000ff;">/.*\/avatar\/(.*)\?.*avatar\-([\d]+).*/</span>','&lt;img src="https://secure.gravatar.com/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2"&gt;',$avatar);
return $avatar;
}
add_filter('get_avatar', 'mywp_get_https_avatar');
```

参考资料[http://www.wpyou.com/wordpress-solution-gravatar-error.html](http://www.wpyou.com/wordpress-solution-gravatar-error.html)