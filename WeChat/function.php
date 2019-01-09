<?php 

// 模拟 http 请求
function https_request($url,$data = null)
{
	// php curl 发起get或者post请求
	// curl 初始化
	$curl = curl_init();	// curl 设置
	curl_setopt($curl, CURLOPT_URL, $url);  
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);  // 校验证书节点
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);// 校验证书主机
	
	// 判断 $data get  or post
	if ( !empty($data) ) {
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	}

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  // 以文件流的形式 把参数返回进来
	// 如果这一行 不写你就收不到 返回值

	// 执行
	$res = curl_exec($curl);
	curl_close($curl);
	return $res;

}






// 自动加载类
function __autoload($className)
{
	if ( file_exists('./Controller/'.$className.'.php') ) {
		include './Controller/'.$className.'.php';
	}
}





 ?>