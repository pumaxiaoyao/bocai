<?php
include_once($C_Patch."/app/member/class/report_sport.php");

$date_POST = $_REQUEST["date"];
$gtype = $_REQUEST["gtype"];

$user_sport_list = report_sport::getSportListByUser($_SESSION["userid"],$date_POST,$gtype);

$subPage = '';
if($user_sport_list && count($user_sport_list)>0){
    foreach ($user_sport_list as $key =>$userSport) {
        $status = "";
        if($userSport['status']==0){
            if($userSport['lose_ok']==0){
                $status = "未结算<br/>(确认中)";
            }elseif($userSport['ball_sort']=="足球滚球" ||$userSport['ball_sort']=="篮球滚球"){
                $status = "未结算<br/>(已确认)";
            }else{
                $status = "未结算";
            }
        }elseif($userSport['status']==1){
            $status = "赢";
        }elseif($userSport['status']==2){
            $status = "输";
        }elseif($userSport['status']==3){
            $status = "注单无效";
        }elseif($userSport['status']==4){
            $status = "赢一半";
        }elseif($userSport['status']==5){
            $status = "输一半";
        }elseif($userSport['status']==6){
            $status = "进球无效";
        }elseif($userSport['status']==7){
            $status = "红卡无效";
        }elseif($userSport['status']==8){
            $status = "和局";
        }
        $bet_info_result = "";
        if($userSport["status"]!=0 && $userSport["status"]!=3&& $userSport["status"]!=8){
            if($userSport["ball_sort"]=="冠军"){
                $match_id = $userSport["match_id"];
                $sql_gj   =	"select x_result from t_guanjun where match_id='$match_id'";
                $query_gj	=	$mysqli->query($sql_gj);
                $row_gj    =	$query_gj->fetch_array();
                $bet_info_result = "<br/>".$row_gj["x_result"];
            }elseif($userSport["MB_Inball"] && $userSport["MB_Inball"]!=''){
                $bet_info_result = "<br/>[".$userSport["MB_Inball"].":".$userSport["TG_Inball"]."]";
            }
        }else{
            $bet_info_result = "";
        }

        $fs_string = "";
        if($userSport["status"]!=0 && $userSport["status"]!=3 && $userSport["status"]!=8){
            $fs_string = '<br/>(反水:'.$userSport["fs"].')';
        }

        $bet_info = $userSport["bet_info"].$bet_info_result;
        $subPage = $subPage.'
    <tr >
    <td style="text-align:center;width: 100px;">'.$userSport["order_num"].'</td>
    <td style="text-align:center;min-width: 90px;">'.$userSport["match_name"].'</td>
    <td style="text-align:center;width: 100px;">'.$userSport["master_guest"].'</td>
    <td style="text-align:center;width: 100px;">'.$bet_info.'</td>
    <td style="text-align:center;width: 100px;">'.$userSport["bet_money"].'</td>
    <td style="text-align:center;width: 100px;">'.($userSport["win"]+$userSport["fs"]).$fs_string.'</td>
    <td style="text-align:center;min-width: 70px;">'.$userSport["bet_time"].'</td>
    <td style="text-align:center;width: 100px;">'.$status.'</td>
    </tr>';
    }
}else{
    $subPage = '<td colspan="8" style="text-align:center;">暂时没有下注信息。</td>';
}
?>
<div id="MACenterContent">
    <div id="MNav">
        <span class="mbtn" >投注记录</span>
        <div class="navSeparate"></div>
    </div>
    <div id="MNavLv2">
        
        <span class="MGameType" onclick="chgType('liveHistory');">真人记录</span>｜
        <span class="MGameType" onclick="chgType('skRecord');">彩票投注记录</span>｜
		<span class="MGameType MCurrentType" onclick="chgType('ballRecord');">体育投注记录</span>｜
        <span class="MGameType" onclick="chgType('cqRecord');">存取款记录</span>｜
    </div>
    <div id="MMainData" style="margin-top: 8px;">
        <div class="MControlNav">
            <select disabled="disabled" name="foo" id="MSelectType" class="MFormStyle">
                <option label="<?=$date_POST?>" dis="false" value="history" selected="selected"><?=$date_POST?></option>
            </select>
            <select disabled="disabled" name="foo" id="MSelectType" class="MFormStyle">
                <option label="<?=$gtype?>" dis="false" value="history" selected="selected"><?=$gtype?></option>
            </select>

            <input type="button" class="MBtnStyle" value="上一页" onclick="f_com.MChgPager({type: 'GET', method: 'sportGameHistory'}, {date: '<?=$date_POST?>'});" onmouseover="mover(this);" onmouseout="mout(this);" />
        </div>
        <table class="MMain" border="1">
            <thead>
            <tr>
                <th>订单号</th>
                <th>联赛名</th>
                <th>主客队</th>
                <th>投注详细信息</th>
                <th>投注金额</th>
                <th>结果</th>
                <th>投注时间</th>
                <th>状态</th>
            </tr>
            </thead>
            <tbody id="general-msg">
            <?=$subPage?>
            </tbody>
            <tfoot id="msgfoot" style="display:none;">
            <tr><td colspan='8' style='text-align:center;'></td></tr>
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

    function chgType(type) {
        switch(type) {
            case 'ballRecord':
                f_com.MChgPager({method: 'ballRecord'});
                break;
            case 'lotteryRecord':
                f_com.MChgPager({method: 'lotteryRecord'});
                break;
            case 'liveHistory':
                f_com.MChgPager({method: 'liveHistory'});
                break;
            case 'gameHistory':
                f_com.MChgPager({method: 'gameHistory'});
                break;
            case 'skRecord':
                f_com.MChgPager({method: 'skRecord'});
                break;
            case 'a3dhHistory':
                f_com.MChgPager({method: 'a3dhHistory'});
                break;
            case 'TPBFightHistory':
                f_com.MChgPager({method: 'TPBFightHistory'});
                break;
            case 'TPBSPORTHistory':
                f_com.MChgPager({method: 'TPBSPORTHistory'});
                break;
            case 'cqRecord':
                f_com.MChgPager({method: 'cqRecord'});
                break;
        }
    }
</script>