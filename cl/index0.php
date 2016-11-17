<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/utils/login_check.php");
include_once($C_Patch."/resource/lottery/getContentName.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/class/six_lottery_order.php");
include_once($C_Patch."/app/member/class/lottery_order.php");
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/app/member/class/user.php");

$module = $_REQUEST["module"];
$method = $_REQUEST["method"];
$args = $_REQUEST["args"];
$other = $_REQUEST["other"];
$type = $_REQUEST["type"];
$msg_id = $_REQUEST["msgid"];

$userInfo = user_group::getLimitAndFsMoney($_SESSION["userid"]);

if($module=="MACenterView" && $method=="memberData"){
?>
<div id="MACenterContent">
    <div id="MNav">
        <span class="mbtn" >基本资讯</span>
        <div class="navSeparate"></div>
    </div>
    <div id="MMainData">
        <h2 class="MSubTitle">基本资讯</h2>
        <table class="MMain" border="1" style="margin-bottom: 8px;">
            <tr>
                <th nowrap>帐户</th>
                <th nowrap>余额</th>
                <th nowrap>最后登入时间</th>
                <th nowrap>密码</th>
            </tr>
            <tr>
                <td style="text-align: center; width: 25%;"><?=$userInfo["user_name"]?></td>
                <td style="text-align: center; width: 25%;" class="MNumber"><?=$_SESSION["user_money"]?></td>
                <td style="text-align: center; width: 25%;"><?=$userInfo["logintime"]?></td>
                <td style="text-align: center; width: 25%;"><input type="button" id="changepw" value="修改密码" /> <input type="button" id="change_qk" value="修改取款密码" /></td>
            </tr>
        </table>
<!--        <h2 class="MSubTitle">有效投注额</h2>-->
<!--        <table class="MMain" border="1">-->
<!--            <tr>-->
<!--                <th style="width: 100px;">日期</th>-->
<!--                <th>金额</th>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td style="text-align: center;">03/03~03/19</td>-->
<!--                <td>0.00&nbsp;&nbsp;( 视讯类_0.00  机率类_0.00  BB体育_0.00  体育投注_0.00  彩票类_0.00  3D类_0.00  )</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td style="text-align: center;">03/17~03/19</td>-->
<!--                <td>0.00&nbsp;&nbsp;( 视讯类_0.00  机率类_0.00  BB体育_0.00  体育投注_0.00  彩票类_0.00  3D类_0.00  )</td>-->
<!--            </tr>-->
<!--        </table>-->
    </div>
</div>
<script type="text/javascript">
    $("#changepw").click(function() {
        window.open('/app/member/account/chg_passwd.php','Chg_pass','width=360,height=320,status=no,scrollbars=yes').focus();
    });
    $("#change_qk").click(function() {
        window.open('/app/member/account/chg_qk_qassw.php','Chg_pass','width=360,height=320,status=no,scrollbars=yes').focus();
    });
    //取沙巴額度
    $.ajax({
        url: '?module=MGetData&method=GetSunPlusDetail&args=Y',
        dataType: 'json',
        success: function(data) {
            $("#MSunplusCredit").html(data.Balance4);
        }
    });
</script>
<?php
}elseif($module=="MACenterView" && in_array($other, array("memberData","moneyView","bankSavings","bankTake","ballRecord","msg"))){
    include_once "pages/main_frame.php";
}elseif($module=="MGetData" && $method=="GetSunPlusDetail" && $args=="Y"){
?>
    {"Balance4":"---"}
<?php
}elseif($module=="MACenterView" && $method=="hotNews"){

    include_once "../app/member/class/sys_announcement.php";
$announcementArray = sys_announcement::getAnnouncementList();
    $subPage = '';
    if($announcementArray && count($announcementArray)>0){
    foreach ($announcementArray as $key =>$announcement) {
        if($key>9){
            break;
        }
        $subPage = $subPage.'
        <tr class="MColor1" align="center">
          <td>'.$announcement['create_date'].'</td>
          <td class="MContent">'.$announcement['content'].'</td>
        </tr>';
    }
    }else{
        $subPage = $subPage.'
        <tr class="MColor1" align="center">
          <td colspan="2">暂时没有消息</td>
        </tr>';
    }
?>
    <style type="text/css">

    </style>
    <div id="MACenterContent">
        <div id="MNav">
            <span class="mbtn" >最新消息</span>
            <div class="navSeparate"></div>
            <a class="mbtn" style="display: none;" href="javascript: f_com.MChgPager({method: 'hotHistory'})" >历史讯息</a>
        </div>
        <div id="MMainData">
            <h2 class="MSubTitle">最新消息</h2>
            <table class="MMain" border="1">
                <thead>
                <tr>
                    <th style="width: 87px;" nowrap>日期</th>
                    <th nowrap>内容</th>
                </tr>
                </thead>
                <tbody>
                <?=$subPage?>
                </tbody>
            </table>
        </div>
    </div><script type="text/javascript">
        $('#CurrentPage').change(function () {
            var option = {
                "module": 'MACenterView',
                "method": 'hotNews'
            };
            var other = {
                'CurrentPage' : this.value
            };
            f_com.MChgPager(option, other);
        });
    </script>
<?php
}elseif($module=="MACenterView" && $method=="msg"){//个人信息

    include_once "../app/member/class/sys_announcement.php";
    $userMassageList = sys_announcement::getUserMassageList($_SESSION["userid"]);
    $subPage = '';
    if($userMassageList && count($userMassageList)>0){
    foreach ($userMassageList as $key =>$userMsg) {
        $subPage = $subPage.'
        <tr id="list'.$userMsg["msg_id"].'" class="haveRead MColor1">
            <td style="text-align:center;width: 150px;">'.$userMsg["msg_time"].'</td>
            <td class="msgdetail" style="padding:0 5px;">
                <a href="javascript:void(0)" title="详细内容" style="display:block;" onclick="oMsg.processMsg(\''.$userMsg["msg_id"].'\', 1, \'getdetail\');">'.$userMsg["msg_title"].'</a>
            </td>
            <td style="text-align:center;"><span id="islook'.$userMsg["msg_id"].'">'.($userMsg["islook"]=="1"?"已读":"未读").'</span></td>
            <td style="text-align:center;">
                <a href="javascript:void(0)" onclick="oMsg.processMsg('.$userMsg["msg_id"].', 1 ,\'delmsg\');">删除</a>
            </td>
        </tr>';
    }
    }else{
        $subPage = $subPage.'
        <tr  class="haveRead MColor1">
            <td style="text-align:center;" colspan="4">暂时没有个人消息</td>
        </tr>';
    }
?>
    <div id="MACenterContent">
        <div id="MNav">
            <span class="mbtn" >个人信息</span>
        </div>
        <div id="MMainData" style="margin-top: 8px;">
            <div class="MControlNav">
                <span style="border: 1px solid red; padding: 2px;">提示：所有信息都变成'已读'状态时，网站的提示声音会自动消失。</span>
            </div>
            <table class="MMain" border="1">
                <thead>
                <tr>
                    <th>发送时间</th>
                    <th>主题</th>
                    <th>是否已读</th>
                    <th>功能</th>
                </tr>
                </thead>
                <tbody id="general-msg">
                <?=$subPage?>
                </tbody>
                <tfoot id="msgfoot" style="display:none;">
                <tr><td colspan='4' style='text-align:center;'></td></tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var oMsg = {
            "totalPage": {},    //總頁數
            "pageMsg": 50,      //每頁顯示訊息數
            "msglist": $('#general-msg'),
            'currentPage': 1,    //當前頁碼
            //訊息處理(閱讀、刪除、設定未讀訊息)
            "processMsg": function(msgId, type, method) {
                var msgwrap = $("#msg" + msgId);
                if(document.getElementById("msg" + msgId) && method == 'getdetail') {
                    if(msgwrap.is(":hidden")) {
                        $("p[id^=msg]").not("#msg" + msgId).slideUp(function() {
                            $(this).parent().css("display", "none");
                        });
                        msgwrap.parent().css("display", "").end().slideDown();
                    }else{
                        msgwrap.slideUp(function() {
                            $(this).parent().css("display", "none");
                        });
                    }
                } else {
                    $.ajax({
                        type:'GET',
                        url:'index.php',
                        dataType:'json',
                        data: {'module': 'MemberMsg', 'method': method, 'type': type, 'msgid': msgId},
                        cache: false,
                        error: function() {
                            alert('Failed!! Please Try Again!!');
                            return false;
                        },
                        success: function(data) {
                            switch(method) {
                                case "getdetail":
                                    $("p[id^=msg]").slideUp(function() {
                                        $(this).parent().css("display", "none");
                                    });
                                    $("#list" + msgId).removeClass('notRead').addClass("haveRead");

                                    var content = "<tr class='msgcontent'><td style='padding-left:5px;' width='524' colspan='4'><p id='msg" + msgId + "' style='display:none;'>" + data.content +"</p></td></tr>";
                                    $("#list" + msgId).after(content);
                                    $("#msg" + msgId).slideDown();
                                    $("#islook" + msgId).text("已读");
                                    break;
                                case "delmsg":
                                    if($("#list" + msgId).next().is("tr[class=msgcontent]")) {
                                        $(".msgcontent").remove();
                                    }
                                    $("#list"+msgId).remove();
                                    oMsg.page(oMsg.currentPage);
                                    break;
                            }

                        }
                    });
                }
            },
            "page": function(p) {
                this.msglist.find("tr").css({"background-color": ""});
                $(".msgcontent").remove();
                oMsg.currentPage = p;
                this.totalPage = Math.ceil(this.msglist.find("tr").length / this.pageMsg);

                if(this.totalPage > 1) {
                    $("#msgfoot").show();
                }
                if(this.totalPage == 1) {
                    $("#msgfoot").hide();
                }
                $("#msgfoot tr td").html("");
                oMsg.msglist.find("tr").hide();

                //判斷最後一頁是否有筆數
                if(oMsg.currentPage > this.totalPage) {
                    oMsg.currentPage = this.totalPage ;
                }
                for(var i = ((oMsg.currentPage-1) * oMsg.pageMsg ) ; i < oMsg.pageMsg + ((oMsg.currentPage - 1) * oMsg.pageMsg); i++) {
                    oMsg.msglist.find("tr:eq(" + i + ")").show();
                }
                for(var t = 1 ; t <= this.totalPage ; t++) {
                    if(oMsg.currentPage == t) {
                        $("#msgfoot tr td").append("<span id='currentpage'>" + t + "</span>");
                    } else {
                        $("#msgfoot tr td").append("<a class='pagelink' href='#' onclick='oMsg.page(" + t + ")'>" + t + "</a>");
                    }
                }
            }
        }

        oMsg.page(oMsg.currentPage);

        $(".MMain tbody tr").hover(function(){
            $("td", this).addClass("mouseenter");
            $("td a", this).addClass("mouseenter");
        }, function() {
            $("td", this).removeClass("mouseenter");
            $("td a", this).removeClass("mouseenter");
        });
    </script>

<?php
}elseif($module=="MemberMsg" && $method=="getdetail" && $type=="1"){
    include_once "../app/member/class/sys_announcement.php";
    $userMassage = sys_announcement::getUserMassageById($msg_id);

    $sql = "update user_msg set islook='1' where msg_id='$msg_id'";
    $query	=	$mysqli->query($sql);
    echo '{"adddate":"'.$userMassage["msg_time"].'","subject":"'.$userMassage["msg_title"].'","content":"'.str_replace(PHP_EOL," ",$userMassage["msg_info"]).'"}';
}elseif($module=="MemberMsg" && $method=="delmsg" && $type=="1"){
    $sql = "delete from user_msg where msg_id='$msg_id'";
    $query	=	$mysqli->query($sql);
    echo '[]';
}elseif($module=="MACenterView" && ($method=="gameSwitch" && $type=="betrecord" || $method=="ballRecord")){//体育赛事报表
    include_once "pages/record_sport.php";
}elseif($module=="MACenterView" && $method=="sportGameHistory"){//体育赛事报表-某一天数据
    include_once "pages/record_sport_oneday.php";
}elseif($module=="MACenterView" && $method=="sportGameDetails"){//体育赛事报表-某一天详细数据
    include_once "pages/record_sport_details.php";
}elseif($module=="MACenterView" && $method=="sportGameCgDetails"){//体育赛事报表-某一天串关详细数据
    include_once "pages/record_sport_cg_details.php";
}elseif($module=="MACenterView" && $method=="sportGameCgDetailsDetails"){//体育赛事报表-某一天串关详细数据--再详细数据
    include_once "pages/record_sport_cg_details_details.php";
}elseif($module=="MACenterView" && ($method=="skRecord" || $method=="SKRecord")){//彩票今天记录
    include_once "pages/record_lottery.php";
}elseif($module=="MACenterView" && $method=="SKHistory"){//彩票7天记录
    include_once "pages/record_lottery_history.php";
}elseif($module=="MACenterView" && $method=="liveHistory" || $method=="aliveHistory"){//视讯直播
    include_once "pages/live_history.php";
}elseif($module=="MACenterView" && $method=="bliveHistory"){//视讯直播
	include_once "pages/blive_history.php";
}elseif($module=="MACenterView" && $method=="AGliveHistory"){//视讯直播
	include_once "pages/ag_live_history.php";
}elseif($module=="MACenterView" && $method=="BBliveHistory"){//视讯直播
	include_once "pages/bb_live_history.php";
}elseif($module=="MACenterView" && $method=="gameSwitch" && $type=="banktrans"){//额度转换
    include_once "pages/money_change.php";
}elseif($module=="MACenterView" && $method=="moneyView"){//额度转换
    include_once "pages/money_change.php";
}elseif($module=="MACenterView" && $method=="bankTake"){//线上取款
    include_once "pages/qukuan.php";
}elseif($module=="MACenterView" && $method=="bankSavings"){//在线存款
    include_once "../php/pay.php";
}elseif($module=="MACenterView" && $method=="bankATM"){//银行汇款
    include_once "pages/huikuan.php";
}elseif($module=="MACenterView" && $method=="bankATM1"){//银行汇款
    include_once "pages/bank.php";
}elseif($module=="MACenterView" && $method=="ewfk"){//在线存款
include_once "pages/ewfk.php";
}elseif($method=="cqRecord"){//存款记录
    include_once "../app/member/user/cha_ckonline.php";
}elseif($method=="chakan_qukuan"){//取款记录
    include_once "../app/member/user/cha_qukuan.php";
}elseif($method=="chakan_cunkuan"){//存款记录
    include_once "../app/member/user/cha_ckonline.php";
}elseif($method=="chakan_huikuan"){//汇款记录
    include_once "../app/member/user/cha_huikuan.php";
}elseif($module=="MGetData" && $method=="GetSunPlusDetail" && ($args=="Y"|| $args="Y,Y")){
    echo '{"Balance4":"---"}';
}else{
    $method_POST = $_REQUEST["method"];
    $date_POST = $_REQUEST["date"];
    $gtype_POST = $_REQUEST["gtype"];
    if($method_POST=="SKLotteryHistory"){//彩票一天记录
        include_once "pages/record_lottery_oneday.php";
    }elseif($method_POST=="SKLotteryHistoryDetails"){//彩票明细记录
        include_once "pages/record_lottery_details.php";
    }elseif($method_POST=="SKLhcHistoryDetails"){//六合彩明细记录
        include_once "pages/record_lhc_details.php";
    }
}
$mysqli->close();
?>