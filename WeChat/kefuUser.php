<?php


 include './function.php';

  $token = file_get_contents('./token.txt');
  $url = 'https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token='.$token."&type=image";


  $img_size=filesize("1.jpg");
  $file_info = array(
        /* 'name'=>'media', */
        'filename' => './1.jpg', //图片相对于网站根目录的路径
        'content-type' => 'image/jpg', //文件类型
        'filelength' => $img_size //图文大小
  );

  $real_path = "{$_SERVER['DOCUMENT_ROOT']}{$file_info['filename']}";
  $data = array(
        "media" => new CURLFile(realpath($real_path)),
    //    'media' => '@'.$real_path,
  );


  $res=https_request( $url, $data);
  var_dump($res);




