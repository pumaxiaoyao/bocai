<?php
include_once($C_Patch."/app/member/class/live_info.php");
?>
<div id="MACenterContent">
    <div id="MNav">
        <span class="mbtn" >投注记录</span>
        <div class="navSeparate"></div>
    </div>
    <div id="MNavLv2">
			
        <span class="MGameType MCurrentType" onclick="chgType('liveHistory');">真人记录</span>｜
        <span class="MGameType" onclick="chgType('skRecord');">彩票投注记录</span>｜
		<span class="MGameType" onclick="chgType('ballRecord');">体育投注记录</span>｜
        <span class="MGameType" onclick="chgType('cqRecord');">存取款记录</span>｜
    </div>
    <div id="MMainData" style="margin-top: 8px;">
            日期：
            <input type="text" value="<?=$_REQUEST["date"]?>" style="width: 70px;background-color: white;" disabled="disabled"/>
			&nbsp;&nbsp;&nbsp;&nbsp;
			玩法：
            <input type="text" value="AG" style="width: 70px;background-color: white;" disabled="disabled"/>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" class="MBtnStyle" value="上一页" onclick="f_com.MChgPager({type: 'GET', method: 'liveHistory'});" onmouseover="mover(this);" onmouseout="mout(this);" />
        <table class="MMain" border="1" style="margin-top:10px">
            <thead>
            <tr>
                <th width=20%>订单号</th>
                <th width=20%>游戏类型</th>
                <th width=20%>下注金额</th>
                <th width=20%>下注时间</th>
				<th width=20%>结果</th>
            </tr>
            </thead>
            <tbody id="general-msg">
            <?php
				$user_live_list=live_info::getUserAGRecord($_SESSION["userid"],$_REQUEST["date"]);
				if($user_live_list){
					foreach($user_live_list as $k1=>$v1){
						echo '<tr>';
						foreach($v1 as $k2=>$v2){
							echo '<td style="text-align:center;">'.$v2.'</td>';
						}
						echo '</tr>';
					}
					echo "<tr style='text-align:center;'>
						<td></td>
						<td>合计</td>
						<td>".$_REQUEST['bbbet']."</td>
						<td>合计</td>
						<td>".$_REQUEST['bbnet']."</td>
					</tr>";
				}
				else{
					echo  '<td colspan="5" style="text-align:center;">暂时没有下注信息。</td>';
				}
			?>
            </tbody>
            <tfoot id="msgfoot" style="display:none;">
            <tr><td colspan='5' style='text-align:center;'></td></tr>
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