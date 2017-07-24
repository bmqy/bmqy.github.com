<?php

/*

url=要post的网址
data=要paost的内容
pem=要带的pem证书名称

*/

header('Content-Type:text/html; charset=utf-8;');
if (isset($_GET['url'])){
	$url=$_GET["url"];	//接收传过来的post网址
	$data = file_get_contents("php://input");//接收post过来的xml参数
	$ipem=$_GET["pem"];
	$responseXml =curl_post_ssl($url,$data,$ipem);
	echo $responseXml;
}else{
	echo "接口通讯正常";
}


function curl_post_ssl($url, $vars, $pemname, $second=30,$aHeader=array())
	{
		$ch = curl_init();
		//超时时间
		curl_setopt($ch,CURLOPT_TIMEOUT,$second);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
		//这里设置代理，如果有的话
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);	
		
		//cert 与 key 分别属于两个.pem文件
		curl_setopt($ch,CURLOPT_SSLCERT,dirname(__FILE__).DIRECTORY_SEPARATOR.'zhengshu'.DIRECTORY_SEPARATOR.$pemname.'_apiclient_cert.pem');
 		curl_setopt($ch,CURLOPT_SSLKEY,dirname(__FILE__).DIRECTORY_SEPARATOR.'zhengshu'.DIRECTORY_SEPARATOR.$pemname.'_apiclient_key.pem');
 		curl_setopt($ch,CURLOPT_CAINFO,dirname(__FILE__).DIRECTORY_SEPARATOR.'zhengshu'.DIRECTORY_SEPARATOR.$pemname.'_rootca.pem');

	 
		if( count($aHeader) >= 1 ){
			curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
		}
	 
		curl_setopt($ch,CURLOPT_POST, 1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$vars);
		$data = curl_exec($ch);
		if($data){
			curl_close($ch);
			return $data;
		}
		else { 
			$error = curl_errno($ch);
			curl_close($ch);
			return false;
		}
	}




?>