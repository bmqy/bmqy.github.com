<?php

/*

url=要post的网址
data=要paost的内容


*/


header('Content-Type:text/html; charset=utf-8;');
if (isset($_GET['url'])){
	$url=$_GET["url"];	//接收传过来的post网址
	$data = file_get_contents("php://input");//接收post过来的xml参数
	$result = vpost($url,$data);		//Post数据
	echo $result;
}else{
	echo "接口通讯正常";
}

function vpost($url,$data){ // 模拟提交数据函数
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
    //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
   // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
	curl_redir_exec($curl);
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
    curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    $tmpInfo = curl_exec($curl); // 执行操作
    if (curl_errno($curl)) {
       echo 'Errno'.curl_error($curl);//捕抓异常
    }
    curl_close($curl); // 关闭CURL会话
    return $tmpInfo; // 返回数据
}


function curl_redir_exec($ch,$debug="")
{
static $curl_loops = 0;
static $curl_max_loops = 20;
if ($curl_loops++ >= $curl_max_loops)
{
$curl_loops = 0;
return FALSE;
}
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
$debbbb = $data;
list($header, $data) = explode("\n\n", $data, 2);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if ($http_code == 301 || $http_code == 302) {
$matches = array();
preg_match('/Location:(.*?)\n/', $header, $matches);
$url = @parse_url(trim(array_pop($matches)));
//print_r($url);
if (!$url)
{
//couldn't process the url to redirect to
$curl_loops = 0;
return $data;
}
$last_url = parse_url(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL));
/*    if (!$url['scheme'])
$url['scheme'] = $last_url['scheme'];
if (!$url['host'])
$url['host'] = $last_url['host'];
if (!$url['path'])
$url['path'] = $last_url['path'];*/
$new_url = $url['scheme'] . '://' . $url['host'] . $url['path'] . ($url['query']?'?'.$url['query']:'');
curl_setopt($ch, CURLOPT_URL, $new_url);
//    debug('Redirecting to', $new_url);
return curl_redir_exec($ch);
} else {
$curl_loops=0;
return $debbbb;
}
}









?>