---
title: 生命不息，折腾不止之“hexo”
tags:
  - hexo
  - next主题
  - 静态博客
categories:
  - 清学小记
abbrlink: 1222
date: 2017-07-18 15:02:49
---

## 前言

“hexo”，一个快速、简洁且高效的博客框架。支持markdown，另外还有好多插件可用。看了几个博主的空间之后，我便觉定要试一试了。

经过几天的折腾<在此心疼我的百度收录一下下...>，还想说：“网友们不好意思啦，又有好多文章链接要变成404了，哦no，原谅我吧”。

### 开工第一步

前提工作就不多说了，安装[Node.js](http://nodejs.org/)、[Git](http://git-scm.com/)。

#### 准备工作

使用淘宝镜像“cnpm”命令

> npm install -g cnpm --registry=https://registry.npm.taobao.org

或者你直接通过添加 npm 参数 alias 一个新命令:

> alias cnpm="npm --registry=https://registry.npm.taobao.org \
--cache=$HOME/.npm/.cache/cnpm \
--disturl=https://npm.taobao.org/dist \
--userconfig=$HOME/.cnpmrc"

Or alias it in .bashrc or .zshrc

> echo '\n#alias for cnpm\nalias cnpm="npm --registry=https://registry.npm.taobao.org \
  --cache=$HOME/.npm/.cache/cnpm \
  --disturl=https://npm.taobao.org/dist \
  --userconfig=$HOME/.cnpmrc"' >> ~/.zshrc && source ~/.zshrc

#### 安装hexo
```cmd
npm install hexo-cli -g
hexo init blog
cd blog
npm install
hexo server
```

#### 主题选择
这里我选择了“[next](http://theme-next.iissnan.com/)”主题，简洁大方符合我的审美观点<。。。>。

这里也要赞一下这个“next”主题，可配置项非常多，能满足日常的使用需求，功能还是相当赞的。

#### 推荐插件
1. [hexo-abbrlink](https://github.com/rozbo/hexo-abbrlink)

  这个生成固定链接的插件，用起来效果还是不错的，推荐使用。
1. [hexo-admin](https://github.com/jaredly/hexo-admin)、[hexo-hey](https://github.com/nihgwu/hexo-hey)

  这两个插件功能是一样的，都是为hexo博客提供个后台管理界面，可根据个人喜好使用。

1. [hexo-wordcount](https://github.com/willin/hexo-wordcount)
  
  字数统计，也是一个必备插件，不多说咯。

## bug处理

1. hexo命令无效

  这个真的有点坑，就只移除了下“hexo-admin”模块，在用hexo命令就提示无效了，哦哦。
  
  > $ hexo s
  > ERROR Local hexo not found in D:\works\bmqy\bmqy.github.com
  > ERROR Try running: 'npm install hexo --save'
  
  解决方法如下：
  
  1. 删除“node_modules”文件夹；
  1. 执行如下命令：
  > npm install
  1. 或者
  > cnpm install
  
## 总结

呵呵，凑点字数吧。

希望以后的云服务器、虚拟主机可以支持nodejs，这个用的感觉还是相当不错的，唯一的遗憾就是，手机端发博文是个短板，希望以后有方法改进。

此文完结，期待更新~~~
