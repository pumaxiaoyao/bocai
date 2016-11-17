<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");

$username=$_SESSION['username'];

$payid=1;
$sql="select user_id,user_name,tel,money from user_list where user_name='$username'";
$query	=	$mysqli->query($sql);
$cou	=	$query->num_rows;
if($cou<=0){
	echo "<script>alert(\"请登录后再进行存款和提款操作\");location.href='/cl/reg.php';</script>";
	exit();
}
$rows	=	$query->fetch_array();


$sql_pay="select * from pay_set where id=".$payid;
$query_pay	=	$mysqli->query($sql_pay);
$cou_pay	=	$query_pay->num_rows;
if($cou_pay<=0){
	echo "<script>alert(\"非常抱歉，在线支付暂时无法使用！\");location.href='http://".$conf_www."/';</script>";
	exit();
}

$rows_pay	=	$query_pay->fetch_array();

?>
<!DOCTYPE html>
<html >
<head>
<title>History</title>
<meta charset="utf-8">
<script>
	var clientW = document.documentElement.clientWidth ;
	document.getElementsByTagName('html')['0'].style.fontSize = clientW/3 + 'px';
</script>
<link href="/css/css_1.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
	.dv{ line-height:25px;}
	.body2{
		width: 2.8rem;
		height: auto;
		margin:0.1rem auto;
		border-radius:0.04rem;
		font-size:12px;
        color:#000000;
		background:#fff;
		padding:0.1rem 0;
	}
	.tds {
		line-height:25px;
	}
	.STYLE1 {font-weight: bold;font-size:0.14rem;;}
    .STYLE2 {color: #0000FF}
	.STYLE12{ color:#F00}
	td{ width:70%; text-align:center; padding:0.05rem 0;}
	#headerBox{ width:100%; height:0.35rem; line-height:0.35rem; background:#986600; box-sizing:border-box; overflow:hidden;  position:relative;  }
#headerBox a{ padding:0.12rem; border-radius:0.12rem; background:rgba(0,0,0,0.3) url(../../img/index_ico.png) center center no-repeat; background-size:70%; position:absolute; left:0.1rem; top:calc(0.18rem - 0.12rem); }
#headerBox .logo{ display:block; position:absolute; left:calc(1.5rem - 0.54rem); top:calc(0.18rem - 0.16rem); height:0.3rem; }
.anniu_02{
    width: 0.6rem;
    background-size: cover;
    height: 0.25rem;
    font-size: 0.12rem;
    border: none;
    position: relative;
    left: -0.1rem;
    font-weight: bold;
    border-radius: 0.05rem;
}
    </style>
<script language="JAVAScript">
//		var $ = function(Id){
//            return document.getElementById(Id);
//        }
    
       
        //数字验证 过滤非法字符
        function clearNoNum(obj){
	        //先把非数字的都替换掉，除了数字和.
	        obj.value = obj.value.replace(/[^\d.]/g,"");
	        //必须保证第一个为数字而不是.
	        obj.value = obj.value.replace(/^\./g,"");
	        //保证只有出现一个.而没有多个.
	        obj.value = obj.value.replace(/\.{2,}/g,".");
	        //保证.只出现一次，而不能出现两次以上
	        obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
	        if(obj.value != ''){

	        var re=/^\d+\.{0,1}\d{0,2}$/;
                  if(!re.test(obj.value))   
                  {   
			          obj.value = obj.value.substring(0,obj.value.length-1);
			          return false;
                  } 
	        }
        }
<!--
//去掉空格
function check_null(string) { 
var i=string.length;
var j = 0; 
var k = 0; 
var flag = true;
while (k<i){ 
if (string.charAt(k)!= " ") 
j = j+1; 
k = k+1; 
} 
if (j==0){ 
flag = false;
} 
return flag; 
}
function VerifyData() {
if (document.form1.MOAmount.value == "") {
			alert("请输入存款金额！")
			document.form1.MOAmount.focus();
			return false;
}
if (document.form1.MOAmount.value < 0) {
			alert("最低冲值<?=$rows_pay['money_Lowest']?>元！")
			document.form1.MOAmount.focus();
			return false;
}
}
-->
</script>
<script language="JavaScript">
    function view_cunkuan(){
        f_com.MChgPager({method: 'chakan_cunkuan'});
    }
<!--
function url(r){
    window.open(r,"mainFrame");  
}
-->
</script>
</HEAD>
<body id="zhuce_body" style="background:#1A1309;font-size:0.14rem;">
<header id="headerBox">
	<a href="/wap.php"></a>
	<img class="logo" src="/img/logo.png" />
</header>
<div class="body2">
<div style="margin:0px 0 10px 0;"><span class="STYLE1"><strong>在线充值</strong></span></div>

<form id="form1" name="form1" action="http://pays.wmnaa.cn/zfpay/MerToDinpay.php?payid=<?=$payid?>" method="post" onsubmit="return VerifyData();" target="_blank">
    <table width="100%" style="border-collapse:collapse;border:1px solid #CCC;font-size:0.14rem;" border="0" cellpadding="1" cellspacing="1" >
                    <tr>
                        <td align="right" style="width:40% !important;text-align:right;"> <font color="#111111">用户帐号:</font></td>
                        <td align="left"><font color="#FF0000"><span class="STYLE5">
                        <?=$username;?>
                        </span></font></td>
                    </tr>
                  <tr>
                    <td align="right" style="width:40% !important;text-align:right;"> <font color="#111111">目前额度:</font></td>
                    <td align="left"><font color="#FF0000"><span class="STYLE5"><?=$rows['money']?></span></font></td>
                  </tr>                    
                    <tr>
                        <td align="right" style="width:40% !important;text-align:right;"><span class="STYLE12">*</span> 
						<font color="#111111">充值金额:</font></td>
                      <td align="left">&nbsp;&nbsp;&nbsp;<input name="MOAmount" type="text" id="MOAmount" style="border:1px solid #CCCCCC;height:0.2rem; width:50%;" onkeyup="clearNoNum(this);" size="15"/>&nbsp;&nbsp;<font style="display:none;" color="#111111">最少充值
                      <?=$rows_pay['money_Lowest']?>元</font></td>
                    </tr>
					<tr><td align="right" style="width:40% !important;">&nbsp;</td>
					<td align="left" valign="middle">
                      &nbsp;&nbsp; <input Type="hidden" Name="S_Name" value="<?=$username;?>"/>
                      <input name="SubTran" class="anniu_02" id="SubTran"  type="submit" value="马上充值" />					</td>
					</tr>
    </table>
                          
  </form>
<table width="96%" border="0" cellpadding="0" cellspacing="5" style="display:none;">
                <tr >
                  <td align="left" style="padding-top:0px;">
					<font color="#111111"><strong class="STYLE1">在线冲值说明：</strong></font></td>
                </tr>
                <tr>

                  <td align="left">
                  <span class="font-hblack"><span >
                  <div style=" line-height:18px; font-size:12px;">
                  <font color="#111111">(1).请按表格填写准确的在线冲值信息,确认提交后会进入选择的银行进行在线付款!                  
					</font>                  </div>
                  <div style=" line-height:18px;font-size:12px;">
                  <font color="#111111">(2).交易成功后请点击返回支付网站可以查看您的订单信息!                  </font>                  </div>
                  <div style=" line-height:18px;font-size:12px;">
                  <font color="#111111">(3).如有任何疑问,您可以联系 在线客服为您提供365天×24小时不间断的友善和专业客户咨询服务!                 
					</font>                 </div>
                  </span>                   </span>                  </td>
   
                </tr>
  </table>              
</div>

<script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
</BODY>
</HTML>
