<?php
session_start();
header("Expires: Mon, 26 Jul 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");          
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header('Content-type: text/json; charset=utf-8');
include_once "../include/com_chk.php";
include_once("../common/function.php");
include_once("../class/guanjun.php");
//这里要进行时间判断
sessionBet($uid);
if($uid=='')
{
	echo "<script>alert('您未登录,请先登录!')</script>";
	session_destroy();
	echo "<script>location.href='/app/member/logout.php';</script>";
	exit;
}
$rows=bet_match::getmatch_info(intval(@$_POST["tid"]));
?>
<div class="match_msg"> 
<input type="hidden" name="ball_sort[]" value="冠军" />
<input type="hidden" name="touzhuxiang[]" value="冠军"  />
<input type="hidden" name="point_column[]" value="match_gj" />
<input type="hidden" name="match_id[]" value="<?=@$_POST["match_id"]?>" />
<input type="hidden" name="tid[]" value="<?=@$_POST["tid"]?>" />
<input type="hidden" name="match_name[]" value="<?=$rows["x_title"]?>"  />
<input type="hidden" name="master_guest[]"  value="<?=$rows["match_name"]?>"/>
<input type="hidden" name="bet_info[]"  value=" <?=$rows["x_title"]?>-<?=$rows["match_name"]?>-<?=$rows["team_name"]?>@<?=$rows["point"]?>"/> 
<input type="hidden" name="bet_point[]" value="<?=double_format($rows["point"])?>" />
<input type="hidden" name="ben_add[]" value="0" />
<input type="hidden" name="match_endtime[]"  value="<?=$rows["Match_CoverDate"]?>"/>
<div class="match_sort">冠军-<?=$rows["x_title"]?></div>
<div class="match_name"><?=$rows["match_name"]?>&nbsp;<? if($rows["match_type"]==2) echo $rows["match_time"]; else echo $rows["match_date"]?></div>
<div class="match_master"><?=$rows["match_master"]?></div>
<div class="match_info">
	<span class="match_master1"><?=$rows["team_name"]?></span>&nbsp;@&nbsp;
	<span style="color:#D90000;"><?=double_format($rows["point"])?></span>&nbsp;&nbsp;&nbsp;&nbsp;<img src="/images/x.gif" alt="取消赛事" width="8" height="8" border="0" onclick="javascript:del_bet(this)" style="cursor:pointer;" />
	</div>
</div>
<?php
$sql_group	=	"SELECT sports_bet,sports_bet_reb,sports_lower_bet FROM user_group where group_id='".@$_SESSION["group_id"]."' limit 0,1";
	$query_group	=	$mysqli->query($sql_group);
	$group_db	=	$query_group->fetch_array();
?>
<script>
bet_file="guanjun";
$("#min_point_span").html('<?=$group_db['sports_lower_bet'] ? $group_db['sports_lower_bet'] : '0'?>');
$("#user_money").html('<?=$_SESSION["user_money"]?>');
//waite();
</script>
<?php
$mysqli->close();
?>