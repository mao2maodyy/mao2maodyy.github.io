<?php 

include './function.php';

// token 接口
// 参数  url  data

$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx347cba688e9bb634&secret=05cd9e736dc9bb5ee100c1727d76cbe6';

// get 
// 没有 $data

$res = https_request($url);

var_dump($res);

// 如何得到 access_token
$data = json_decode($res,true);  // 二参  不写 默认为false 则返回是对象
// josn_encode arr=>json

var_dump($data);
echo "<hr/>";
$token = $data['access_token'];
var_dump($token);


file_put_contents('./token.txt',$token);













 ?>