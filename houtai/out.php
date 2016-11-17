<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");

include_once($C_Patch."/app/member/include/config.inc.php");

include_once($C_Patch."/app/member/common/function.php");

include_once("common/login_check.php"); 

include_once("class/admin.php");

admin::insert_log($_SESSION["login_name"],get_ip(),$_SESSION["login_time"],"成功退出",$session_str,$bj_time_now,$bj_time_now);
$ssid=$_SESSION["ssid"];
$sql = "delete from sys_manage_online where session_str='$ssid'";//刪除超時用戶
	
$mysqli->query($sql);

unset($_SESSION["adminid"]);
unset($_SESSION["ssid"]);
unset($_SESSION["purview"]);
unset($_SESSION["login_name"]);
unset($_SESSION["login_time"]);

session_destroy();
echo "<script>window.parent.location.href='/houtai'</script>";
?>