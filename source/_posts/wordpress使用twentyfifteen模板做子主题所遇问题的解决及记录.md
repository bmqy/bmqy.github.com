---
title: wordpress使用twentyfifteen模板做子主题所遇问题的解决及记录
tags:
  - Continue reading改成中文
  - wordpress
  - wordpress子主题
  - 首页文章列表显示摘要
id: 215
categories:
  - 清学小记
abbrlink: 35865
date: 2015-02-06 23:07:04
---

<span style="color: #0000ff;">因为之前一直是直接对主题做修改，经过几次主题升级后，啊哦，问题来了，突然发现之前的修改都失效了，一查才知道，原来是主题升级后就这样白费了，于是搜来方法，推荐使用子主题做修改，这样可以保证父主题升级后不会影响子主题的修改，当然果断采用了。</span>

<span style="color: #0000ff;">然而用过一段时间后发现，这个wordpress的“twentyfifteen”主题，好多都是英文的标签，再加上之前偶然发现的这个首页的文章列表一直显示的都是全文，于是乎我决定动手改改，但是问题也接踵而至，而最关键的就是这个“twentyfifteen”主题的好多英文标签都是直接写在"inc/template-tags.php"这个文件里的，而在子主题里根本不能直接复制过来修改用，经过网上的搜索和几天来的研究终于所有问题搞定了，现记录如下：</span>

<span style="color: #0000ff;">**1、**首页文章列表使用摘要而不是全文，修改方法如下：</span>

<span style="color: #0000ff;">1）复制父主题中的“content.php”文件，重命名为“content-excerpt.php”（短横杠后边名字可任意），然后修改以下代码中的“the_content”为“the_excerpt”。</span>
> /* translators: %s: Name of current post */> 
> the_content( sprintf(> 
> __( 'Continue reading %s', 'twentyfifteen' ),> 
> the_title( '&lt;span class="screen-reader-text"&gt;', '&lt;/span&gt;', false )> 
> ) );
<span style="color: #0000ff;">2）修改子主题目录的首页文件“index.php”的以下代码中的“content”为“content-excerpt”；</span>
> get_template_part( 'content', get_post_format() );
<span style="color: #0000ff;">3）修改后，即可在首页以摘要形式显示文章列表，如需更改摘要字数，请修改wordpress目录下“\wp-includes\formatting.php”文件，找到以下代码，修改其中的数字为你想要显示的摘要字数；</span>
> $excerpt_length = apply_filters( 'excerpt_length', 55 );
<span style="color: #0000ff;">**2、**修改子主题中的英文标签，包括“Edit”、“Next”、“Previous”、“Continue reading”、“Leave a comment”、“Comment”等等英文标签。</span>

<span style="color: #0000ff;">其中“Edit、Next、Previous”可直接在子主题目录中的“content.php或是content-excerpt.php”和“single.php”文件中修改，找到对应标签内的英文修改即可，**如果用中文请注意转换为utf-8编码使用，否则显示在页面是乱码**。</span>

<span style="color: #0000ff;">这里主要记录一下“Continue reading”标签的修改方法，另外两个标签修改方法雷同，具体修改方法如下：</span>

<span style="color: #0000ff;">1）复制父主题中的“functions.php”文件到子主题目录中，然后清空里边的函数，在这里添加所要修改的父主题的中的函数，例如这个显示“Continue reading”的函数；</span>

<span style="color: #0000ff;">2）找到父主题目录下“inc\template-tags.php”文件，复制以下代码到子主题目录中的“functions.php”文件中，修改其中的“Continue reading %s”为你想要的中文，记得转为utf-8编码；</span>
> if ( ! function_exists( 'twentyfifteen_excerpt_more' ) &amp;&amp; ! is_admin() ) :> 
> /**> 
> * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.> 
> *> 
> * @since Twenty Fifteen 1.0> 
> *> 
> * @return string 'Continue reading' link prepended with an ellipsis.> 
> */> 
> function twentyfifteen_excerpt_more( $more ) {> 
> $link = sprintf( '&lt;a href="%1$s" class="more-link"&gt;%2$s&lt;/a&gt;',> 
> esc_url( get_permalink( get_the_ID() ) ),> 
> /* translators: %s: Name of current post */> 
> sprintf( __( 'Continue reading %s', 'twentyfifteen' ), '&lt;span class="screen-reader-text"&gt;' . get_the_title( get_the_ID() ) . '&lt;/span&gt;' )> 
> );> 
> return ' &amp;hellip; ' . $link;> 
> }> 
> add_filter( 'excerpt_more', 'twentyfifteen_excerpt_more' );> 
> endif;
<span style="color: #0000ff;">3）修改好后，即可完成修改，如需修改其它标签可参考此法；</span>

<span style="color: #0000ff;">至此所有问题搞定，啊哦，好累。。。</span>

<span style="color: #0000ff;">**注：原创文章，转载请注明出处，thankyou！**</span>