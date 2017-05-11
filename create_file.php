<?php
//	将内容写入xml文件并且保存于服务器上
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin:*");
ini_set("error_reporting","E_ALL & ~E_NOTICE");
//1.接受前端页面输入的值
$content=$_POST['contentN'];

//2.原始数据转化为xml格式
$title_size = 1;
//2.1xml的版本信息

//2.2输入内容写入xml格式
//$xml .= "<article>\n";
$xml .= create_item($title_size, $content);
//$xml .= "</article>\n";
	
//2.3指定文件路径
$path="../upload";//指定路径
$uniName=md5(uniqid(microtime(true),true)).'.'.$ext.'xml';//确保文件名唯一，防止重名产生覆盖

//$extName=strtolower(end(explode('.',$upfile['name'])));//时间戳命名法
//$uniName=date("Ymdhis").".".$extName.'xml';
$destination=$path.'/'.$uniName;//指定文件夹下
//2.4写入指定文件中
file_put_contents($destination,$xml);
echo $destination;
//  创建XML单项
function create_item($title_size, $content){
	$item="";
	$title_data=$uniName;
    $item = "<title size=\"" . $title_size . "\">" . $title_data . "</title>\n";
    $item = $content;
    return $item;
}
?> 
