<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include "../app/member/include/address.mem.php";
include "../app/member/include/config.inc.php";


echo '
document.getElementById("login-username").innerHTML = "'.$_SESSION["username"].'";
document.getElementById("bet-credit").innerHTML = "'.$_SESSION["user_money"].'";
var Left = document.getElementById("message_box");
Left.style.display = "none";
Left.innerHTML = "  <div class=\"inner\">\n      <div class=\"msg-title\">最新消息</div>\n      <div class=\"msg-text\"></div>\n    </div>\n    <div class=\"footer\"></div>\n  ";
betSpace.bet.clearBack();
(self.GoldUI) && (self.GoldUI.closeGoldMenu());
';