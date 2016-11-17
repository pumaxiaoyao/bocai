<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include "../../app/member/include/address.mem.php";
include "../../app/member/include/config.inc.php";
include "../../app/member/utils/convert_name.php";
include "../../app/member/utils/time_util.php";
include "../../app/member/class/odds_lottery_normal.php";
include "../../app/member/class/lottery_schedule.php";
include "../../app/member/class/user_group.php";
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/ltConfig.php");


$gType = $_GET["gtype"];
$rType = $_GET["rtype"];

include_once "b5_util.php";

$action = '';
if(($gType == "CQ" || $gType == "TJ" || $gType == "JX") && in_array($rType, array("595","596","597"))){
    $action = '{"Game":"<form id=\"formB5\" name=\"CQ_20140208-088\" action=\"..\/D3_order.php\" method=\"post\" onsubmit=\"return false\">  <input type=\"hidden\" name=\"gid\" value=\"352564\" \/>  <input type=\"hidden\" name=\"MyRtype\" value=\"'.$rType.'\" \/>  <input type=\"hidden\" name=\"gtype\" value=\"'.$gType.'\" \/><!--\u671f\u6570\u65f6\u95f4--> <div class=\"spaceH\">  <input class=\"order\" type=\"button\" name=\"GTSALL\" value=\"\u5168\u5305\" \/>  \u7ec4\u9009\u4e09\u81f3\u5c11\u8981\u9009\u62e95\u4e2a\u53f7\u7801!!  <\/div>  <div class=\"round-table\">  <table class=\"GameTable\">  <tr class=\"title_line\">  <td>\u524d\u4e09<\/td>  <td>\u52fe\u9009<\/td>  <td>\u524d\u4e09<\/td>  <td>\u52fe\u9009<\/td> <td>\u524d\u4e09<\/td>  <td>\u52fe\u9009<\/td>  <td>\u524d\u4e09<\/td>  <td>\u52fe\u9009<\/td>  <td>\u524d\u4e09<\/td>  <td>\u52fe\u9009<\/td>  <\/tr>  <tr>  <td class=\"num\">0<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"0\" \/>  <\/td>  <td class=\"num\">1<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"1\" \/>  <\/td>  <td class=\"num\">2<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"2\" \/>  <\/td>  <td class=\"num\">3<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"3\" \/>  <\/td>  <td class=\"num\">4<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"4\" \/>  <\/td>  <\/tr>  <tr>  <td class=\"num\">5<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"5\" \/>  <\/td>  <td class=\"num\">6<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"6\" \/>  <\/td>  <td class=\"num\">7<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"7\" \/>  <\/td>  <td class=\"num\">8<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"8\" \/>  <\/td>  <td class=\"num\">9<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"9\" \/>  <\/td>  <\/tr>    <\/table>  <\/div>  <div id=\"SendB5\">    <input type=\"button\" name=\"Cancel\" value=\"\u53d6\u6d88\" class=\"cancel_cen\" \/>&nbsp;&nbsp;    <input type=\"button\" name=\"order\" value=\"\u786e\u5b9a\" class=\"order\" disabled=\"disabled\" \/>    <input type=\"hidden\" name=\"shownum_tmp\" value=\"\" id=\"shownum_tmp\" \/>  <\/div>  <\/form>    ",  "HKTime":"'.time().'","c_rtype":"(\u524d\u4e09)\u7ec4\u9009\u4e09","YearNum":"'.$qishu.'","Msg":"~\u6b22\u8fce\u5149\u4e34~","num":null,"final_01":null,"final_02":null,"final_03":null,"final_04":null,"final_05":null,"iResultCount":0}';
}elseif(($gType == "CQ" || $gType == "TJ" || $gType == "JX") && in_array($rType, array("598","599","600"))){
    $action = '{"Game":"<form id=\"formB5\" name=\"TJ_20140208-071\" action=\"..\/D3_order.php\" method=\"post\" onsubmit=\"return false\">  <input type=\"hidden\" name=\"gid\" value=\"352775\" \/>  <input type=\"hidden\" name=\"MyRtype\" value=\"'.$rType.'\" \/>  <input type=\"hidden\" name=\"gtype\" value=\"'.$gType.'\" \/><!--\u671f\u6570\u65f6\u95f4--> <div class=\"spaceH\">  \u7ec4\u9009\u516d\u6700\u5c11\u8981\u9009\u62e94\u4e2a\u53f7\u7801\uff0c\u6700\u591a\u4e0d\u53ef\u8d85\u8fc78\u4e2a!!  <\/div>  <div class=\"round-table\">  <table class=\"GameTable\">  <tr class=\"title_line\">  <td>\u524d\u4e09<\/td>  <td>\u52fe\u9009<\/td>  <td>\u524d\u4e09<\/td>  <td>\u52fe\u9009<\/td>  <td>\u524d\u4e09<\/td>  <td>\u52fe\u9009<\/td> <td>\u524d\u4e09<\/td>  <td>\u52fe\u9009<\/td>  <td>\u524d\u4e09<\/td>  <td>\u52fe\u9009<\/td>  <\/tr>  <tr>  <td class=\"num\">0<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"0\" \/>  <\/td>  <td class=\"num\">1<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"1\" \/>  <\/td>  <td class=\"num\">2<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"2\" \/>  <\/td>  <td class=\"num\">3<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"3\" \/>  <\/td>  <td class=\"num\">4<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"4\" \/>  <\/td>  <\/tr>  <tr>  <td class=\"num\">5<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"5\" \/>  <\/td>  <td class=\"num\">6<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"6\" \/>  <\/td>  <td class=\"num\">7<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"7\" \/>  <\/td>  <td class=\"num\">8<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"8\" \/>  <\/td>  <td class=\"num\">9<\/td>  <td class=\"odds\">  <input type=\"checkbox\" name=\"concede[]\" value=\"9\" \/>  <\/td>  <\/tr>    <\/table>  <\/div>  <div id=\"SendB5\">    <input type=\"button\" name=\"Cancel\" value=\"\u53d6\u6d88\" class=\"cancel_cen\" \/>&nbsp;&nbsp;    <input type=\"button\" name=\"order\" value=\"\u786e\u5b9a\" class=\"order\" disabled=\"disabled\" \/>    <input type=\"hidden\" name=\"shownum_tmp\" value=\"\" id=\"shownum_tmp\" \/>  <\/div>  <\/form>    ",  "HKTime":"'.time().'","c_rtype":"(\u524d\u4e09)\u7ec4\u9009\u516d","YearNum":"'.$qishu.'","Msg":"~\u6b22\u8fce\u5149\u4e34~","num":null,"final_01":null,"final_02":null,"final_03":null,"final_04":null,"final_05":null,"iResultCount":0}';
}

if($is_close == "true" ){
    $action = '{"Game":"<!--\u5373\u65f6\u6447\u73e0-->  <div class=\"round-table\">  <table class=\"GameTable\" id=\"ff\">    <tr class=\"title_line\">      <td>\u671f\u6570 <\/td>          <td>\u53f7\u7801 1<\/td>      <td>\u53f7\u7801 2<\/td>      <td>\u53f7\u7801 3<\/td>   <td>\u53f7\u7801 4<\/td> <td>\u53f7\u7801 5<\/td>     <\/tr>      <tr>      <td id=\"num\" style=\"font-weight:bold;\">'.$qishu.'<\/td>      <td id=\"final_01\" ><\/td>      <td id=\"final_02\" ><\/td>      <td id=\"final_03\" ><\/td> <td id=\"final_04\" ><\/td><td id=\"final_05\" ><\/td>   <\/tr>    <\/table>  <\/div>  ","HKTime":"'.date("Y-m-d H:i:s",time()).'","c_rtype":"\u7ec4\u9009\u4e09","YearNum":null,"Msg":"~\u6b22\u8fce\u5149\u4e34~","num":"20140228-10","final_01":"","final_02":"","final_03":"","iResultCount":0}';
}

echo $action;
$mysqli->close();
exit;