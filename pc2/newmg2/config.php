<?php

$top_pre = "b2";
$pre = "yl66y";   // 玩家前缀
$comId = "yl66y";       //商户ID//
$comKey = "917d60e281a09da0";   //商户密钥
$agpassword = "78041sodf4s5de";
$gamePlatform = "MG"; //平台名称
$report_url = 'http://47.88.8.241:741/index.php/Reports/index/create_mg_json/?dl='.$comId.'&t=';

unset($mysqli);
$mysqli	=	new MySQLi("localhost","root","LOVEbaby1218!@#$","yl66y");
$mysqli->query("set names utf8");

function randomnames($length)
{
 $pattern='1234567890abcdefghijklmnopqrstuvwxyz';
 for($i=0;$i<$length;$i++)
 {
   $key .= $pattern{mt_rand(0,35)}; 
 }
 return $key;
}
?>