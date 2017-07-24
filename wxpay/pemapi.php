<?php

/*

act=执行动作  new新建 del删除
newfilename=pem名称
unlink=要删除的pem名称

执行新建动作要post pem文件流
*/

function receiveStreamFile($receiveFile){
    $streamData = isset($GLOBALS['HTTP_RAW_POST_DATA'])? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
    if(empty($streamData)){
        $streamData = file_get_contents('php://input');
    }
    if($streamData!=''){
        $ret = file_put_contents($receiveFile, $streamData, true);
    }else{
        $ret = false;
    }
    return $ret;
}
$newfilename=$_GET["newfilename"];
$receiveFile = 'zhengshu/'.$newfilename.'.pem';
$Delete=$_GET["unlink"];
$action = !empty($_GET['act']) ? $_GET['act'] : null;

if ($action == "new") {	
	$ret = receiveStreamFile($receiveFile);
	echo json_encode(array('success'=>(bool)$ret));	
}
elseif ($action == "del") {
		$dn='zhengshu/'.$newfilename.'.pem';
		 if(file_exists($dn)) {
        	echo unlink($dn) ? 'Ok' : 'No';
   		 } else {
       		 echo 'No Find';
   		 }
		
}



?>