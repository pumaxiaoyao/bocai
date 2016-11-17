﻿<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");

$username=$_SESSION["username"];
$uid=intval($_SESSION["userid"]);
$payid="";
$paytype="";
$payurl="";
$sql="select * from pay_set where b_start=1 and money_Already<money_limits order by order_id asc limit 1";
$query	=	$mysqli->query($sql);
$cou	=	$query->num_rows;
if($cou<=0){

	$sql2="select * from pay_set order by order_id desc ";
	$query2	=	$mysqli->query($sql2);
	$cou2	=	$query2->num_rows;
	if($cou2<=0){
		echo "<script>alert(\"非常抱歉，在线支付暂时无法使用！\");</script>";
		echo "非常抱歉，在线支付暂时无法使用！";
		exit();
	}else{
	

		while($rows2 = $query2->fetch_array()){
			
			if($rows2['money_limits']>$rows2['money_Already'])
			{
                $sql = "DROP TRIGGER BeforeUpdatePayset;";
                $mysqli->query($sql);
				$mysqli->query("update pay_set set b_start='0'");
				$mysqli->query("update pay_set set b_start='1' where id='".intval($rows2['id'])."'");
                $sql = "   CREATE TRIGGER `BeforeUpdatePayset` BEFORE update ON `pay_set`
                          FOR EACH ROW BEGIN
                            insert into pay_set(id) values (old.id);
                          END;
                    ";
                $mysqli->query($sql);
				$payid=$rows2['id'];
				$paytype=$rows2['pay_type'];
				$payurl=$rows2['pay_domain'];
				break;
			}
		}

		if($payid=="")
		{
			echo "<script>alert(\"非常抱歉，在线支付暂时无法使用！\");</script>";
			echo "非常抱歉，在线支付暂时无法使用！";
			exit();
		}
	}
}else{

	$rows	=	$query->fetch_array();
	$payid=$rows['id'];
	$paytype=$rows['pay_type'];
	$payurl=$rows['pay_domain'];
}

$gurl="";
if($paytype==1)
{
		$gurl="http://www.yl00853.com/php/qianyifu/pay.php?username=".$username."&uid=".$uid;
//$gurl="http://".$payurl."/php/Dinpay2.0/pay.php?payid=".$payid."&username=".$username."&uid=".$uid;
}
else if($paytype==6)
{
    $gurl="http://".$payurl."/php/Dinpay3.0/pay.php?payid=".$payid."&username=".$username."&uid=".$uid;
}
else if($paytype==2)
{
	$gurl="http://".$payurl."/php/yeepay/pay.php?payid=".$payid."&username=".$username."&uid=".$uid;
}
else if($paytype==3)
{
	$gurl="http://".$payurl."/php/ips/pay.php?payid=".$payid."&username=".$username."&uid=".$uid;
}
else if($paytype==4)
{
	$gurl="http://".$payurl."/php/jftpay/pay.php?payid=".$payid."&username=".$username."&uid=".$uid;
}
else if($paytype==5)
{
	$gurl="http://".$payurl."/php/vftpay/pay.php?payid=".$payid."&username=".$username."&uid=".$uid;
}
else if($paytype==7)
{
	$gurl="http://".$payurl."/php/kjbpay/pay.php?payid=".$payid."&username=".$username."&uid=".$uid;
}else if($paytype==8)
{
    $gurl="http://".$payurl."/php/bfpay/pay.php?payid=".$payid."&username=".$username."&uid=".$uid;
}else if($paytype==9)
{
    $gurl="http://".$payurl."/php/hcpay/pay.php?payid=".$payid."&username=".$username."&uid=".$uid;
}else if($paytype==10)
{
    $gurl="http://".$payurl."/php/kypay/pay.php?payid=".$payid."&username=".$username."&uid=".$uid;
}else if($paytype==11)
{
    $gurl="http://".$payurl."/php/mbpay/pay.php?payid=".$payid."&username=".$username."&uid=".$uid;
}else if($paytype==12)
{
    $gurl="http://".$payurl."/php/gfbpay/pay.php?payid=".$payid."&username=".$username."&uid=".$uid;
}else{
	echo "<script>alert(\"非常抱歉，在线支付暂时无法使用！\");</script>";
	echo "非常抱歉，在线支付暂时无法使用！";
	exit;
	$gurl="http://".$conf_www."/";
}

//重定向浏览器 
//header("Location: ".$gurl); //确保重定向后，后续代码不会被执行
//exit;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>index</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/css/css_1.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/js/jquery-1.7.1.js" ></script>
    <style type="text/css">
        .dv{ line-height:25px;}
        .body2{
            width: 737px;
            height: auto;
            padding: 10px 0 0 12px;
            margin-left:10px;
            margin-right:10px;
            float:left;
            font-size:12px;
            color:#000000;
        }
        .tds {
            line-height:25px;
        }
        .STYLE1 {font-weight: bold;font-size:12px;}
        .STYLE2 {color: #0000FF}
        .STYLE12{ color:#F00}
    </style>
    <script type="text/javascript">
        function showFrame(){
            $("#MMainData").css("display","none");
        }
    </script>
</HEAD>
<body id="zhuce_body">

<div id="MACenterContent">
    <div id="MNav">
        <a href="javascript: f_com.MChgPager({method: 'moneyView'});" class="mbtn">额度转换</a>
        <div class="navSeparate"></div>
        <span class="mbtn">线上存款</span>
        <div class="navSeparate"></div>
        <a href="javascript: f_com.MChgPager({method: 'bankATM'});" class="mbtn">银行汇款</a>
        <div class="navSeparate"></div>
        <a href="javascript: f_com.MChgPager({method: 'bankTake'});" class="mbtn">线上取款</a>
    </div>
    <div id="MMainData" style="margin-top: 8px;">

        <div class="body2">
            <!--<div style="margin:0px 0 10px 0;">
                <a class="len" onclick="showFrame();" target="chongzhiFrame" href="<?=$gurl?>" style="color:#00F;text-decoration: underline;width: 110px; height: 41px;"><img src="/images/chongzhi.jpg" /></a>
            </div>
-->


		<!---->
        <table width="720" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px #FFF solid;">
	
	<tr>
		<td colspan="2" align="center" valign="middle">

			<div class="content">
					
				
                
                
       
                
                <table class="MMain MNoBorder" width="98%">
                <tbody>
                 <tr>
                    <td nowrap=""><a class="pagelink" href="javascript: f_com.MChgPager({method: 'bankATM1'});">在线存款 (网银存款) </a></td>
                  </tr>
                  <tr>
                    <td class="MNotice"><div id="notices">
                        <div>
                          <p> 支持150多家网银进行转账，存款完成，系统自动实时入账！</p>
                          <p> 温馨提示：1、在线存款仅提供小额入款，推荐您使用更高存款额度的"银行卡划款"；</p>
                          <p> 　　　　　2、支付成功后，务必点击确定键、或『返回商家』按钮，金额会立即加入；</p>
                          <p> 存款遇到问题？请立即联系"在线客服"为您服务。</p>
                        </div>
                      </div></td>
                  </tr>
                  
                   
                  <tr>
                    <td nowrap=""><a class="pagelink" href="javascript: f_com.MChgPager({method: 'bankATM'});">银行卡划款（3分钟到帐）</a></td>
                  </tr>
                  <tr>
                    <td class="MNotice"><div id="notices">
                        <div>
                          <p> 推荐您使用银行卡划款</p>
						     <p> <span style="color:#daa520;"><strong>★无需网银 ★存款享优惠 ★极速稳定到帐 ★更高存款额度</strong></span></p>
                          <p> 转账步骤:</p>
                          <p> ※1、进入"银行卡划款"，选择您使用的银行。</p>
                          <p> ※2、查看到公司银行账号，进行转账。</p>
                          <p> ※3、转账完成后选择您转入的银行，填写转账数据。</p>
                          <p> ※4、存款完成，1-3分钟火速到帐！</p>
                        </div>
                      </div></td>
                  </tr>
                  <tr>
                    <!--<td nowrap=""><a class="pagelink" href="javascript: void(0);" onclick="show('ew_show')">二维码支付 （微信 支付宝 财付通）</a></td>-->
                    <td nowrap=""><a class="pagelink" href="javascript: f_com.MChgPager({method: 'ewfk'});">二维码支付 （微信 支付宝 财付通）</a></td>
                  </tr>
                  <tr>
                    <td class="MNotice"><div id="notices">
                        <div>
                <p> <span style="color:#daa520;"><strong>★方便快捷</strong></span></p>
                          <p> 转账步骤:</p>
                          <p> ※1、进入"二维码支付"，选择您使用的扫码方式。</p>
                          <p> ※2、使用对应手机APP进行扫码快速付款。</p>
                          <p> ※3、付款完成后填写转账数据。</p>
                        </div>
                      </div></td>
                  </tr>
                  				 
                  
                  
                 
				  
				                  </tbody>
              </table>
                
                
                <!---->
                
  <style>
  table.MMain td{ line-height:1.5em; color:#666; padding:6px 8px; text-align:left;}
  table.MMain td.MNotice{color:#555;}
  table.MMain td a.pagelink{color:#004892;font-weight:bold;}
  table.MMain td.MNotice #notices p{line-height:22px;}

  </style>              
                
                
					
				
			</div>
		</td>
	</tr>
</table>
        <!---->
        </div>

    </div>
    <iframe id="chongzhiFrame" name="chongzhiFrame" frameborder="0" scrolling="no" width="100%"  allowtransparency="true" height="0">
    </iframe>


</div>
</BODY>
</HTML>
