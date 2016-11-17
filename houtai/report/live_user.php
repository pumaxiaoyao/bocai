<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once("../lottery/getContentName.php");

//check_quanxian("查看报表");

$gtype = $_GET["gtype"];
$s_time = $_GET["s_time"];
if(!$s_time){
    $s_time = date('Y-m-d');
}
$e_time = $_GET["e_time"];
if(!$e_time){
    $e_time = date('Y-m-d');
}
$user_group = $_GET["user_group"];
$user_ignore_group = $_GET["user_ignore_group"];

$date_month = $_GET['date_month'];
$arrGameTypes = Array(
	'BAC' => '百家乐',
	'CBAC' => '包桌百家乐',
	'LINK' => '连环百家乐',
	'DT' => '龙虎',
	'SHB' => '骰宝',
	'ROU' => '轮盘',
	'FT' => '番摊',
	'SL2'  => '水果'
);
$arrPayTypes = Array(
	1	=> '庄',
	2	=> '闲',
	3	=> '和',
	4	=> '庄对',
	5	=> '闲对',
	6	=> '大',
	7	=> '小',
	8	=> '散客区庄',
	9	=> '散客区闲',
	11	=> '庄(免佣)',
	21	=> '龙',
	22	=> '虎',
	23	=> '和',
	41	=> '大',
	42	=> '小',
	43	=> '单',
	44	=> '双',
	45	=> '全围',
	46	=> '围1',
	47	=> '围2',
	48	=> '围3',
	49	=> '围4',
	50	=> '围5',
	51	=> '围6',
	52	=> '单点1',
	53	=> '单点2',
	54	=> '单点3',
	55	=> '单点4',
	56	=> '单点5',
	57	=> '单点6',
	58	=> '对子1',
	59	=> '对子2',
	60	=> '对子3',
	61	=> '对子4',
	62	=> '对子5',
	63	=> '对子6',
	64	=> '组合12',
	65	=> '组合13',
	66	=> '组合14',
	67	=> '组合15',
	68	=> '组合16',
	69	=> '组合23',
	70	=> '组合24',
	71	=> '组合25',
	72	=> '组合26',
	73	=> '组合34',
	74	=> '组合35',
	75	=> '组合36',
	76	=> '组合45',
	77	=> '组合46',
	78	=> '组合56',
	79	=> '和值4',
	80	=> '和值5',
	81	=> '和值6',
	82	=> '和值7',
	83	=> '和值8',
	84	=> '和值9',
	85	=> '和值10',
	86	=> '和值11',
	87	=> '和值12',
	88	=> '和值13',
	89	=> '和值14',
	90	=> '和值15',
	91	=> '和值16',
	92	=> '和值17',
	101 => '直接注',
	102 => '分注',
	103 => '街注',
	104 => '三数',
	105 => '角注',
	106 => '4个号码',
	107 => '列1',
	108 => '列2',
	109 => '列3',
	110 => '线注',
	111 => '打一',
	112 => '打二',
	113 => '打三',
	114 => '红',
	115 => '黑',
	116 => '大',
	117 => '小',
	118 => '单',
	119 => '双',
	130 => '1番',
	131 => '2番',
	132 => '3番',
	133 => '4番',
	134 => '1念2',
	135 => '1念3',
	136 => '1念4',
	137 => '2念1',
	138 => '2念3',
	139 => '2念4',
	140 => '3念1',
	141 => '3念2',
	142 => '3念4',
	143 => '4念1',
	144 => '4念2',
	145 => '4念3',
	146 => '角(1,2)',
	147 => '单',
	148 => '角(1,4)',
	149 => '角(2,3)',
	150 => '双',
	151 => '角(3,4)',
	152 => '1,2四通',
	153 => '1,2三通',
	154 => '1,3四通',
	155 => '1,3二通',
	156 => '1,4三通',
	157 => '1,4二通',
	158 => '2,3四通',
	159 => '2,3一通',
	160 => '2,4三通',
	161 => '2,4一通',
	162 => '3,4二通',
	163 => '3,4一通',
	164 => '三门(3,2,1)',
	165 => '三门(2,1,4)',
	166 => '三门(1,4,3)',
	167 => '三门(4,3,2)',
);
?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="../images/css/admin_style_1.css" type="text/css" media="all" />
</head>
<script type="text/javascript" charset="utf-8" src="../js/jquery-1.7.2.min.js" ></script>
<script language="javascript">
    function setDate(dateType){
        var dateNow= new Date();
        var dateStart;
        var dateEnd;
        if(dateType=="today"){
            dateStart = dateNow.Format("yyyy-MM-dd");
            dateEnd = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="yesterday"){
            dateNow.addDays(-1);
            dateStart = dateNow.Format("yyyy-MM-dd");
            dateEnd = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastSeven"){//最近7天
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-6);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastThirty"){//最近30天
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-29);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="thisWeek"){//本周
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-dateNow.getDay());
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastWeek"){//上周
            dateNow.addDays(-dateNow.getDay()-1);
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-6);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="thisMonth"){//本月
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-dateNow.getDate()+1);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }else if(dateType=="lastMonth"){//上月
            dateNow.addDays(-dateNow.getDate());
            dateEnd = dateNow.Format("yyyy-MM-dd");
            dateNow.addDays(-dateNow.getDate()+1);
            dateStart = dateNow.Format("yyyy-MM-dd");
        }
        $("#s_time").val(dateStart);
        $("#e_time").val(dateEnd);
        $("#form1").submit();
    }

    function check(){
        if(!$("#s_time").val() || !$("#e_time").val() ){
            alert("请输入开始/结束日期。")
        }
        return true;
    }

    function onChangeMonth(value){
        if(value==""){
            return;
        }
        var dateNow= new Date();
        var dateStart;
        var dateEnd;

        dateNow.addDays(-dateNow.getDate()+1);
        dateNow.addMonths(-dateNow.getMonth()+parseInt(value)-1);
        dateStart = dateNow.Format("yyyy-MM-dd");
        dateNow.addMonths(1);
        dateNow.addDays(-1);
        dateEnd = dateNow.Format("yyyy-MM-dd");

        $("#s_time").val(dateStart);
        $("#e_time").val(dateEnd);
        $("#form1").submit();
    }

    Date.prototype.Format = function (fmt) { //author: meizz
        var o = {
            "M+": this.getMonth() + 1, //月份
            "d+": this.getDate(), //日
            "h+": this.getHours(), //小时
            "m+": this.getMinutes(), //分
            "s+": this.getSeconds(), //秒
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度
            "S": this.getMilliseconds() //毫秒
        };
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    };
    Date.prototype.addDays = function(d)
    {
        this.setDate(this.getDate() + d);
    };

    Date.prototype.addWeeks = function(w)
    {
        this.addDays(w * 7);
    };

    Date.prototype.addMonths= function(m)
    {
        var d = this.getDate();
        this.setMonth(this.getMonth() + m);

        if (this.getDate() < d)
            this.setDate(0);
    };

    Date.prototype.addYears = function(y)
    {
        var m = this.getMonth();
        this.setFullYear(this.getFullYear() + y);

        if (m < this.getMonth())
        {
            this.setDate(0);
        }
    };
    //测试 var now = new Date(); now.addDays(1);//加减日期操作 alert(now.Format("yyyy-MM-dd"));

    Date.prototype.dateDiff = function(interval,endTime)
    {
        switch (interval)
        {
            case "s":   //計算秒差
                return parseInt((endTime-this)/1000);
            case "n":   //計算分差
                return parseInt((endTime-this)/60000);
            case "h":   //計算時差
                return parseInt((endTime-this)/3600000);
            case "d":   //計算日差
                return parseInt((endTime-this)/86400000);
            case "w":   //計算週差
                return parseInt((endTime-this)/(86400000*7));
            case "m":   //計算月差
                return (endTime.getMonth()+1)+((endTime.getFullYear()-this.getFullYear())*12)-(this.getMonth()+1);
            case "y":   //計算年差
                return endTime.getFullYear()-this.getFullYear();
            default:    //輸入有誤
                return undefined;
        }
    }
    //测试 var starTime = new Date("2007/05/12 07:30:00");     var endTime = new Date("2008/06/12 08:32:02");     document.writeln("秒差: "+starTime .dateDiff("s",endTime )+"<br>");     document.writeln("分差: "+starTime .dateDiff("n",endTime )+"<br>");     document.writeln("時差: "+starTime .dateDiff("h",endTime )+"<br>");     document.writeln("日差: "+starTime .dateDiff("d",endTime )+"<br>");     document.writeln("週差: "+starTime .dateDiff("w",endTime )+"<br>");     document.writeln("月差: "+starTime .dateDiff("m",endTime )+"<br>");     document.writeln("年差: "+starTime .dateDiff("y",endTime )+"<br>");

</script>
<script language="JavaScript" src="/js/calendar.js"></script>
<body>
<div id="pageMain">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
            <td valign="top">
                <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="font12" bgcolor="#798EB9">
                    <form name="form1" id="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();">
                        <tr>
                            <td align="left" bgcolor="#FFFFFF">
                                <a title="返回上一页" style="color: #F37605;"  href="live_details.php?gtype=<?=$_GET["gtype"]?>&amp;s_time=<?=$s_time?>&amp;e_time=<?=$e_time?>&amp;date_month=<?=$date_month?>">返回上一页</a>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" bgcolor="#FFFFFF">
                                &nbsp;&nbsp;
                                日期：<input name="s_time" type="text" id="s_time" value="<?=$s_time?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                ~
                                <input name="e_time" type="text" id="e_time" value="<?=$e_time?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                &nbsp;&nbsp;
                                <input type="button" value="今日" onclick="setDate('today')"/>
                                <input type="button" value="昨日" onclick="setDate('yesterday')"/>
                                <input type="button" value="本周" onclick="setDate('thisWeek')"/>
                                <input type="button" value="上周" onclick="setDate('lastWeek')"/>
                                <input type="button" value="本月" onclick="setDate('thisMonth')"/>
                                <input type="button" value="上月" onclick="setDate('lastMonth')"/>
                                <input type="button" value="最近7天" onclick="setDate('lastSeven')"/>
                                <input type="button" value="最近30天" onclick="setDate('lastThirty')"/>
                                <select name="date_month" id="date_month" onchange="onChangeMonth(this.value)">
                                    <option value="" <?=$date_month=='' ? 'selected' : ''?>>选择月份</option>
                                    <option value="1"  <?=$date_month==1 ? 'selected' : ''?>>1月</option>
                                    <option value="2"  <?=$date_month==2 ? 'selected' : ''?>>2月</option>
                                    <option value="3"  <?=$date_month==3 ? 'selected' : ''?>>3月</option>
                                    <option value="4"  <?=$date_month==4 ? 'selected' : ''?>>4月</option>
                                    <option value="5"  <?=$date_month==5 ? 'selected' : ''?>>5月</option>
                                    <option value="6"  <?=$date_month==6 ? 'selected' : ''?>>6月</option>
                                    <option value="7"  <?=$date_month==7 ? 'selected' : ''?>>7月</option>
                                    <option value="8"  <?=$date_month==8 ? 'selected' : ''?>>8月</option>
                                    <option value="9"  <?=$date_month==9 ? 'selected' : ''?>>9月</option>
                                    <option value="10" <?=$date_month==10 ? 'selected' : ''?>>10月</option>
                                    <option value="11" <?=$date_month==11 ? 'selected' : ''?>>11月</option>
                                    <option value="12" <?=$date_month==12 ? 'selected' : ''?>>12月</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" bgcolor="#FFFFFF">
                                &nbsp;&nbsp;
                                用户名：<input name="user_group" value="<?=$user_group?>" style="width: 200px;" type="text"> (多个用户用 , 隔开)
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                忽略用户名：<input name="user_ignore_group" value="<?=$user_ignore_group?>" type="text" style="width: 200px;"> (多个用户用 , 隔开)
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input name="gtype" type="hidden" id="gtype" value="<?=$gtype?>" />
                                <input type="submit" name="Submit" value="搜索">
                            </td>
                        </tr>
                    </form>
                </table>
                <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
                    <tr style="background-color:#3C4D82; color:#FFF" align="center">
                        <td><strong>编号</strong></td>
						<td><strong>会员名</strong></td>
						<td><strong>真人用户名</strong></td>
						<td><strong>单号</strong></td>
						<td><strong>下注时间</strong></td>
						<td><strong>下注金额</strong></td>
						<td><strong>有效投注</strong></td>
						<td><strong>返水</strong></td>
						<td><strong>结果</strong></td>
						<td><strong>游戏</strong></td>
						<td><strong>玩法</strong></td>
						<td><strong>桌号</strong></td>
						<td><strong>局号</strong></td>
						<td><strong>下注IP</strong></td>
                    </tr>
                    <?php
                    include("../../include/pager.class.php");

                    $t_allmoney=0;
                    $t_sy=0;
                    $uid	=	'';
                    $inUserString = "";

                    if($user_group || $user_ignore_group){
                        $userArray = array();
                        $userIgnoreArray = array();
                        $userArrayString = "";
                        $userIgnoreArrayString = "";
                        $sql_sub = "";

                        if(strpos($user_group,",")!==false){
                            $userArray = explode(",",trim($user_group));
                        }elseif(strpos($user_group,"，")!==false){
                            $userArray = explode("，",trim($user_group));
                        }elseif($user_group){
                            $userArrayString = "'".$user_group."'";
                        }
                        if(strpos($user_ignore_group,",")!==false){
                            $userIgnoreArray = explode(",",trim($user_ignore_group));
                        }elseif(strpos($user_ignore_group,"，")!==false){
                            $userIgnoreArray = explode("，",trim($user_ignore_group));
                        }elseif($user_ignore_group){
                            $userIgnoreArrayString = "'".$user_ignore_group."'";
                        }
                        if($userArray){
                            foreach($userArray as $key => $value){
                                $userArrayString .= "'".trim($value)."'".",";
                            }
                            $userArrayString = substr($userArrayString, 0, -1);
                        }
                        if($userIgnoreArray){
                            foreach($userIgnoreArray as $key => $value){
                                $userIgnoreArrayString .= "'".trim($value)."'".",";
                            }
                            $userIgnoreArrayString = substr($userIgnoreArrayString, 0, -1);
                        }

                        $sql		=	"SELECT user_id FROM user_list";
                        if($userArrayString && $userIgnoreArrayString){
                            $sql_sub = " WHERE user_name IN($userArrayString) AND user_name NOT IN($userIgnoreArrayString)";
                        }elseif($userArrayString && !$userIgnoreArrayString){
                            $sql_sub = " WHERE user_name IN($userArrayString)";
                        }elseif(!$userArrayString && $userIgnoreArrayString){
                            $sql_sub = " WHERE user_name NOT IN($userIgnoreArrayString)";
                        }

                        $sql .= $sql_sub;
                        $query	=	$mysqli->query($sql)or die ("error!");
                        $rs = array();
                        while($row = $query->fetch_array()){
                            $rs[] = $row;
                        }
                        if(count($rs)>0){
                            foreach($rs as $key => $value){
                                $inUserString .= "'".$value["user_id"]."'".",";
                            }
                            $inUserString = "(".substr($inUserString, 0, -1).")";
                        }elseif(count($rs)==0){
                            $inUserString = "('')";
                        }
                    }

                    $sql	=	"select  u.id  FROM user_list u,agbetdetail a where a.playerName=";
					if($_GET['gtype']=='AG'){
						$sql.="u.ag_username and platformType in('ag','agin') ";
					}
					else{
						$sql.="u.bb_username and platformType in('bb','bbin') ";
					}
                    if($inUserString != "") $sql .= " AND user_id IN $inUserString";
                    if($s_time) $sql.=" and betTime>='".$s_time." 00:00:00'";
                    if($e_time) $sql.=" and betTime<='".$e_time." 23:59:59'";
                    $sql.=" order by u.id desc ";

                    $query	=	$mysqli->query($sql);
                    $sum		=	$mysqli->affected_rows; //总页数
                    $thisPage	=	1;
                    $pagenum	=	50;
                    if($_GET['page']){
                        $thisPage	=	$_GET['page'];
                    }
                    $CurrentPage=isset($_GET['page'])?$_GET['page']:1;
                    $myPage=new pager($sum,intval($CurrentPage),$pagenum);
                    $pageStr= $myPage->GetPagerContent();

                    $bid		=	'';
                    $i		=	1; //记录 bid 数
                    $start	=	($thisPage-1)*$pagenum+1;
                    $end		=	$thisPage*$pagenum;
                    while($row = $query->fetch_array()){
                        if($i >= $start && $i <= $end){
                            $bid .=	$row['id'].',';
                        }
                        if($i > $end) break;
                        $i++;
                    }
                    if($bid){
                        $bid	=	rtrim($bid,',');
                        $sql	=	"SELECT a.* FROM agbetdetail  a ,user_list u where  a.playerName =";
						if($_GET['gtype']=='AG'){
							$sql.="u.ag_username";
						}
						else{
							$sql.="u.bb_username";
						}
						if($inUserString != "") $sql .= " AND user_id IN $inUserString";
                        $sql.=" order by betTime desc";
                        $query	=	$mysqli->query($sql);

                        while ($rows = $query->fetch_array()) {
                            $color = "#FFFFFF";
                            $over	 = "#EBEBEB";
                            $out	 = "#ffffff";
                            $t_allmoney+=$rows['betAmount'];
                            $t_sy += $rows['netAmount'];
                            ?>
                            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                                <td  align="center" ><?=$rows["id"]?></td>
							    <td><?=$_GET['user_group']?></td>
							    <td><?=$rows["playerName"]?></td>
							    <td><?php echo $rows['billNo']?></td>
							    <td><?=$rows["betTime"]?></td>
							    <td><?php echo $rows['betAmount']?></td>
							    <td><?=$rows["validBetAmount"]?></td>
							    <td><?php echo $rows['fs_money']?></td>
							    <?php if($rows["netAmount"]<0){ ?>
							    <td><font color="#FF0000"><?=$rows["netAmount"]?></font></td>
							    <?php }else{ ?>
							    <td><?=$rows["netAmount"]?></td>
							    <?php } ?>
							    <td><?=$arrGameTypes[$rows["gameType"]]?></td>
							    <td><?php if($rows['playType']!="") echo $arrPayTypes[$rows['playType']] ;?></td>
							    <td><?php echo $rows['tableCode']?></td>
							    <td><?php echo $rows['gameCode']?></td>
							    <td ><?php echo $rows['loginIP']?></td>
                            </tr>
                        <?php
                        }
                    }
                    ?>
                    <tr style="background-color:#FFFFFF;">
                        <td colspan="14" align="center" valign="middle">当前页总投注金额:<?=$t_allmoney?>元 &nbsp;&nbsp;   当前页投注结果:<?=$t_sy?>元&nbsp;&nbsp;   当前页赢取金额:<?=$t_allmoney - $t_sy?>元</td>
                    </tr>
                    <tr style="background-color:#FFFFFF;">
                        <td colspan="14" align="center" valign="middle"><?php echo $pageStr;?></td>
                    </tr>

                </table></td>
        </tr>
    </table>
</div>
</body>
</html>
<?
$mysqli->close();
?>