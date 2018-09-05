<?php



$dateTime = gmdate("D, d M Y H:i:s T");
$SecretId = 'AKIDgz33go7zufbgrt6azbakwbx7tx0jampv84kz';
$SecretKey = 'lCIC0ZQhtcI5u36Lojuh2bnOBqaKy6r5FF4Qc1';
$srcStr = "date: ".$dateTime."\n"."source: "."yousali";
$Authen = 'hmac id="'.$SecretId.'", algorithm="hmac-sha1", headers="date source", signature="';
$signStr = base64_encode(hash_hmac('sha1', $srcStr, $SecretKey, true));
//echo $signStr;
$Authen = $Authen.$signStr."\"";
echo $Authen;
#echo '</br>';

$url = 'http://service-3mm3bc6g-1251762227.ap-guangzhou.apigateway.myqcloud.com/release/yousa';
$headers = array( 
	'Host:service-3mm3bc6g-1251762227.ap-guangzhou.apigateway.myqcloud.com',
	'Accept:text/html, */*; q=0.01',
	'Source: yousali',
	'Date: '.$dateTime,
	'Authorization: '.$Authen,
	'X-Requested-With: XMLHttpRequest',
	'Accept-Encoding: gzip, deflate, sdch'
);
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL,$url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_TIMEOUT, 60); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

$data = curl_exec($ch); 

if (curl_errno($ch)) { 
	print "Error: " . curl_error($ch); 
} else { 
	// Show me the result 
	var_dump($data); 
	curl_close($ch); 
} 

?>
