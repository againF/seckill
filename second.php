<?php
date_default_timezone_set('Asia/Shanghai'); 

$itemid = intval($_REQUEST['id']);
$res['errno'] = 0;
if (!$itemid) {
	$res['errno'] = 10001;
}
$token = getToken();
$res['data'] = array(
	'url' => 'http://localhost/seckill/buy.php?v='.$token['code'],
	'token' => $token['hash'],
	'itemid' => $itemid,
);

function getToken() 
{
	$num  = 15;
	$str  = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVW";
	$code = '';
	for ($i = 0; $i < $num; $i++) {
		$code .= $str[mt_rand(0, strlen($str)-1)];
	} 
	return array('code'=>$code, 'hash'=>md5($code));
}

echo json_encode($res);

