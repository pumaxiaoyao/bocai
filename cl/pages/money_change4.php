<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/class/live_info.php");
include_once($C_Patch."/app/member/class/sys_config.php");
//include_once($C_Patch."/live/agid.php");
include_once($C_Patch."/app/member/class/user.php");

session_start();
$uid    =   isset($_SESSION["userid"])? $_SESSION["userid"]:'';
$loginid=   isset($_SESSION["uid"])? $_SESSION["uid"]:'';
if(!isset($_SESSION["uid"]) || !isset($_SESSION["username"])){
    header("Location:/index.php");
    exit();
}
unset($mysqli);
$mysqli =   new MySQLi("localhost","root","LOVEbaby1218!@#$","yl66y");
$mysqli->query("set names utf8");


//$user_info = live_info::getUserAndLife($_SESSION["userid"],'BBIN');
if(true){
    $sql = "select u.money, u.user_name, u.bb_username, u.ag_username from user_list u where u.user_id='".$_SESSION["userid"]."' limit 0,1";
    $query	=	$mysqli->query($sql);
    $user_info    =	$query->fetch_array();
}

$bbinstyle="";
//if($bbinid!=""){
if(false){
	//$user_info_bbin = live_info::getUserAndLife($_SESSION["userid"],'BBIN');
}
else{
	$bbinstyle="style=\"display: none;\"";
}
//$min_change_money = sys_config::getMinChangeMoney();


//--------------------------

//$userinfo2  =  user::getinfo($_SESSION["userid"]);
//if($userinfo2['bb_username']!=''){$bbinid = "dg555668";}


//  ---------------------------------0505----------------------

$action=isset($_GET['action'])? $_GET['action']:'';
if($action=='save'){
    $userinfo       =   user::getinfo($uid);
    $username  = $userinfo['user_name'];
    $agusername  = $userinfo["ag_username"];
    $bbusername  = $userinfo["bb_username"];

    $zztype=isset($_POST['zz_type'])? $_POST['zz_type']:'';
    $zzmoney=isset($_POST['zz_money'])? $_POST['zz_money']:'';

    if($agusername=="" && ($zztype==1||$zztype==2) ){
        include_once($C_Patch."/newag2/config.php");
        include_once($C_Patch."/newag2/api.class.php");
        $bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
        //$agusername = $top_pre.randomnames(6);
        if(!$bbinapi->GameUserRegister($agusername, $agpassword)){
            //echo "<script>alert('请联系管理员开通AG账号');</script>";exit;
            echo '请联系管理员开通AG账号';exit;
        }  
        
        $sql = "update user_list set ag_username = '$agusername',ag_password = '$agpassword' where user_name = '$username'";
        $mysqli->query($sql);
        
        unset($pre); unset($comId); unset($comKey); unset($top_pre);
        unset($agpassword);  unset($gamePlatform); 
    }

    if($bbusername=='' && ($zztype==7||$zztype==8) ){
        include_once($C_Patch."/newbbin2/config.php");
        include_once($C_Patch."/newbbin2/api.class.php");
        $bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
        //$agusername = 'bmw'.$pre.$username;
        if(!$bbinapi->GameUserRegister($agusername, $agpassword)){ 
           //echo "<script>alert('请联系管理员开通BBIN账号');</script>";exit;
           echo '请联系管理员开通BBIN账号'; exit;
        }  
        
        $sql = "update user_list set bb_username = '$agusername',bb_password = '$agpassword' where username = '$username'";
        $mysqli->query($sql);
        
        unset($pre); unset($comId); unset($comKey); 
        unset($agpassword);  unset($gamePlatform);         
    }
    //---------------------------------------------------------


    
    $sql = "select * from user_list where user_id='$uid'";
    $result = $mysqli->query($sql);
    $row=$result->fetch_array();
    //$conver=htmlEncode(doubleval($zzmoney));
    $conver=doubleval($zzmoney);

    if( ($zztype==1||$zztype==7) && (($conver<0)||($conver>$row["money"])) ){
        //echo "<script>alert('转账金额不能大于账户余额，请重新输入。'); history.go(-1);</script>";
    	echo '转账金额不能大于账户余额，请重新输入。';
        exit;
    }

    if($zztype==1 || $zztype==2){
        include_once($C_Patch."/newag2/config.php");
        include_once($C_Patch."/newag2/api.class.php");
        $bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
        if($zztype==1){
            $pay_value  =   0-$conver;
            $about="体育/彩票账户->AG大厅";
            $result = $bbinapi->TransferIn($agusername, $password, $conver);
        }
        elseif($zztype==2){
            $pay_value=$conver;
            $about = "AG大厅->体育/彩票账户";
            $result = $bbinapi->TransferOut($agusername, $password, $pay_value);
        }
    }
    elseif($zztype==7 || $zztype==8){
        include_once($C_Patch."/newbbin2/config.php");
        include_once($C_Patch."/newbbin2/api.class.php");
        $bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
        if($zztype==7){
            $pay_value  =   0-$conver;
            $about="体育/彩票账户->BBIN大厅";
            $result = $bbinapi->TransferIn($bbusername, $password, $conver);
        }
        elseif($zztype==8){
            $pay_value=$conver;
            $about = "BBIN大厅->体育/彩票账户";
            $result = $bbinapi->TransferOut($bbusername, $password, $pay_value);
        }
    }

    if($result===true){
        try{
	        $mysqli->autocommit(FALSE);
	        $mysqli->query("BEGIN"); 
	        $sql="update user_list set money=money+$pay_value where user_id='$uid'";
	        $mysqli->query($sql);
	        $q1=$mysqli->affected_rows;
	        
	        $order=date("YmdHis")."_".$_SESSION['username'];
	        $change_money = intval($pay_value);
	        $assets = $row["money"];
	        $datereg=   date("YmdHis").randomkeys(4);

	        if($zztype==1 || $zztype==7)  $balance = $assets-$change_money;
	        elseif($zztype==2 || $zztype==8)  $balance = $assets+$change_money;
	        
	        $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$uid','$datereg','$about',now(),'真人转账','$change_money','$assets','$balance');";
	        $mysqli->query($sql) or die($sql);
	        $q2=$mysqli->affected_rows;
	        if($q1==1 && $q2==1){
	             $mysqli->commit();
	             //message('转换申请已经提交转换.','money_change.php');
	             echo '转换申请已经提交转换.'; exit;
	        }else{
	            $mysqli->rollback(); //数据回滚
	            //message("由于网络堵塞，本次申请提款2失败。\\n请您稍候再试，或联系在线客服。",'money_change.php');
	            echo "由于网络堵塞，本次申请提款2失败。请您稍候再试，或联系在线客服。";
	            exit;
	        }

	    }catch(Exception $e){
	        $mysqli->rollback(); 
	        //message("由于网络堵塞，本次申请提款失败。\\n请您稍候再试，或联系在线客服。");
	        echo '数据量异常!'; exit;
	    }
    }
    elseif(strpos($result,'信用额度不足')>0){
        //$result0 = '信用额度不足';
        //echo "转入失败,".$result0;
        //exit("<script>alert('信用额度不足！');history.back();</script>");
        echo '信用额度不足！'; exit;
    }
    else{
        echo "转入失败,请2分钟后尝试!"; exit;
        //exit("<script>alert('".$result."！');history.back();</script>");
    }

}

function randomkeys($length)
{
 $pattern='1234567890';
 for($i=0;$i<$length;$i++)
 {
   $key .= $pattern{mt_rand(0,9)}; 
 }
 return $key;
}

?>



<script type="text/javascript" src='js/jquery-1.7.1.js'></script>

<script type="text/javascript">
    
</script>

<div id="MACenterContent">
   <div id="MNav">
        <span class="mbtn">额度转换</span>
        <div class="navSeparate"></div>
        <a href="javascript: f_com.MChgPager({method: 'bankSavings'});" class="mbtn">线上存款</a>
        <div class="navSeparate"></div>
        <a href="javascript: f_com.MChgPager({method: 'bankATM'});" class="mbtn">银行汇款</a>
        <div class="navSeparate"></div>
        <a href="javascript: f_com.MChgPager({method: 'bankTake'});" class="mbtn">线上取款</a>
    </div>
   
    <div id="MMainData" style="margin-top: 8px;">
        <h2 class="MSubTitle">目前额度</h2>
        <table class="MMain" border="1" style="margin-bottom: 8px;">
            <thead>
            <tr>
                <th style="width: 25%;" nowrap>类型</th>
                <th style="width: 25%;" nowrap>帐户</th>
                <th style="width: 25%;" nowrap>余额</th>
                <th style="width: 25%;" nowrap>更新时间</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td width="25%" style="text-align: center;">主账户</td>
                <td width="25%" style="text-align: center;"><?=$user_info["user_name"]?></td>
                <td width="25%" style="text-align: center;"><span id="MBallCredit"><?=$user_info["money"]?></span>&nbsp;&nbsp;</td>
                <td width="25%" style="text-align: center;"><?=date("Y-m-d H:i:s")?></td>
            </tr>
            <tr>
                <td style="text-align: center;">AG娱乐场</td>
                <td style="text-align: center;">
				<?=$user_info["ag_username"]?></td>
                <td style="text-align: center;"><span id="MSunplusCredit"><?=$user_info["normal_money"]?></span>&nbsp;&nbsp;</td>
                <td style="text-align: center;"><?=$user_info["update_time"]?></td>
            </tr>

			<tr>
                <td style="text-align: center;">BBIN娱乐场</td>
                <td style="text-align: center;"><?=$user_info["bb_username"]?>
                </td>
                <td style="text-align: center;"><span id="general">...<!--<?=$user_info_bbin["normal_money"]?>--></span>&nbsp;&nbsp;</td>
                <td style="text-align: center;"><?=$user_info_bbin["update_time"]?></td>
            </tr>
            <tr style="display: none;">
                <td style="text-align: center;">AG VIP厅</td>
                <td style="text-align: center;"><?=$user_info["live_username"]?></td>
                <td style="text-align: center;"><span id="MSunplusCredit"><?=$user_info["vip_money"]?></span>&nbsp;&nbsp;</td>
                <td style="text-align: center;"><?=$user_info["update_time"]?></td>
            </tr>
            <tr style="display: none;">
                <td style="text-align: center;">太阳城</td>
                <td style="text-align: center;"><?=$user_info_tyc["live_username"]?></td>
                <td style="text-align: center;"><span id="TYCCredit"><?=$user_info_tyc["normal_money"]?></span>&nbsp;&nbsp;</td>
                <td style="text-align: center;"><?=$user_info_tyc["update_time"]?></td>
            </tr>
            </tbody>
        </table>
        <h2 class="MSubTitle">额度转换</h2>
        <form action="/cl/pages/money_change.php?action=save" id="form1" method="post" name="form1">
        <table class="MMain MNoBorder" style="width: auto;">
        <!--tr>
            <td nowrap>钱包转账：</td>
            <td>
                <a href="javascript: f_com.MChgPager({method: 'liveHistory'});">查询转账记录</a>
            </td>
        </tr-->
            <tr>
                <td nowrap>
                    转账选择：
                </td>
                <td>
                    <select name="zz_type" id="zz_type">
                        <option value="1">主账户->AG娱乐场</option>
                        <option value="7">主账户->BBIN娱乐场</option>
                        <option value="2">AG娱乐场->主账户</option>
                        <option value="8">BBIN娱乐场->主账户</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td nowrap>
                    转账金额：
                </td>
                <td>
                    <input type="text" name="zz_money" id="zz_money" onkeyup="if(isNaN(value))execCommand('undo')" /> &nbsp;最低转账金额:<?=$min_change_money?>
                </td>
            </tr>
            <tr>
                <td nowrap></td>
                <td>
                    <input type="button" onclick="confirmChangeMoney()" value="确认转账" />
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>


<script type="text/javascript">
    function ALL_money(){
        $.getJSON("../app/member/getdata.php?callback=?", function (json) {
            if (json.close == 1) {
                parent.location.href = '/close.php';
            }
            $("#MBallCredit").html(json.user_money);
        });
    }
    function AG_money(){
        $.get("./newag2/cha.php?callback=?",function(data){
           data = eval('('+data+')');
           $("#MSunplusCredit").html(data.general);
          
        });

    }
    function BB_money(){
        $.get("./newbbin2/cha.php?callback=?",function(data){
            data = eval('('+data+')');
            $("#general").html(data.general);
        });

    }
    AG_money(); BB_money();

 
</script>
<script type="text/javascript">
    function confirmChangeMoney(){
        if(confirm("确定转账吗？")){
            if($("#MSunplusCredit").text()=='未开通' || (!$("#MSunplusCredit").text()) ){
                if($("#zz_type").val()==2||$("#zz_type").val()==1){
                    alert('请进入AGIN游戏开通账号');
                    return;
                }
            }
            if($("#general").text()=='未开通' || (!$("#general").text()) ){
                if($("#zz_type").val()==7||$("#zz_type").val()==8){
                    alert('请进入BBIN游戏开通账号');
                    return;
                }
            }
            if(!$("#zz_money").val()){
                alert("请输入转账金额。");
                return;
            }
            var regu = /^[-]{0,1}[0-9]{1,}$/;
            if(!regu.test($("#zz_money").val())){
                alert('请输入整数。');
                return;
            }
            if( ($("#zz_money").val()<1)){
                alert("小于最低转账金额，请重新输入。");
                return;
            }
            if(($("#zz_type").val()==1 || $("#zz_type").val()==7) && ($("#MBallCredit").text()-$("#zz_money").val()<0)){
                alert("主账户余额 小于 转账金额，请重新输入。");
                return;
            }
           if(($("#zz_type").val()==2) && ($("#MSunplusCredit").text()<$("#zz_money").val()) ){
                alert("真人账户余额 小于 转账金额，请重新输入。");
                return;
            }
            if(($("#zz_type").val()==8) && ($("#general").text()<$("#zz_money").val()) ){
                alert("真人账户余额 小于 转账金额，请重新输入。");
                return;
            }
            var aa=$("#zz_type").val();
            var bb=$("#zz_money").val();
            $.ajax({
                type:'post',
                url:'/money_change.php?action=save',
                data:{'zz_type':aa,'zz_money':bb},
                beforeSend:function(x){
                    console.log(this.data.zz_type+" "+this.data.zz_money);
                },
                success:function(d){
                    alert(d);
                    AG_money(); BB_money(); ALL_money();
                }

            })

        }
    }
</script>


<style type="text/css">
body{
    background:url(body.jpg) top center no-repeat #272A31;
    color:white;
    padding-top:10px; 
}
#MACenterContent{
    background-color: rgb(76,0,98);
    padding: 10px;
    width: 80%;
    margin:0 auto;
}
table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 90%;  
    margin:0 auto;

    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;     
}
table tr:hover {
    background: rgb(91,78,214);
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;     
} 
table td, table th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
    text-align: left;    
}     
table th {
    background-color: rgb(133,133,223);
    /*background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); */
}
table th{
    text-align: center;
}
select{
    font-size: 16px;
}


</style>




