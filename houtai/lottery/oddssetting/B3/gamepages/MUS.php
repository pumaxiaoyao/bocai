<?php

$odds = odds_lottery_normal::getOdds($lottery_name,"佰个和数");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB3" name="D3_018" action="/member/quickB3_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="MUS"/>\'+
\'<input type="hidden" name="gtype" value="'.$gType.'"/>\'+
\'<input type="hidden" name="gold_gmax" value="5000"/>\'+
\'<input type="hidden" name="gold_gmin" value="'.$lowestMoney.'"/>\'+
\'<input type="hidden" name="SC" value="50000"/>\'+
\'<input type="hidden" name="SO" value="5000"/>\'+
\'<input type="hidden" name="Maxcredit" value="'.$userMoney.'"/>\'+
\'<input type="hidden" id="D3type" name="D3type" value="A"/>\'+
\'<div class="InfoBar">\'+
    \'<div class="Range" style="display:none">\'+
        \'<span class="On"><input type="radio" name="jjomj" value="0" checked="checked"/> 000~199</span>\'+
        \'<span><input type="radio" name="jjomj" value="2"/>200~399</span>\'+
        \'<span><input type="radio" name="jjomj" value="4"/>400~599</span>\'+
        \'<span><input type="radio" name="jjomj" value="6"/>600~799</span>\'+
        \'<span><input type="radio" name="jjomj" value="8"/>800~999</span>\'+
        \'</div>\'+
    \'<input type="hidden" name="Start" value="0"/>\'+
    \'</div>\'+
\'<div class="round-table">\'+
\'<table class="GameTable">\'+
\'<tr class="title_line">\'+
    \'<td>号码</td>\'+
    \'<td>赔率</td>\'+
    \'<td>号码</td>\'+
    \'<td>赔率</td>\'+
    \'<td>号码</td>\'+
    \'<td>赔率</td>\'+
    \'<td>号码</td>\'+
    \'<td>赔率</td>\'+
    \'<td>号码</td>\'+
    \'<td>赔率</td>\'+
    \'</tr>\'+
\'<tr>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS0">\'+
            \'0\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h0"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS1">\'+
            \'1\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h1"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS2">\'+
            \'2\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h2"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS3">\'+
            \'3\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h3"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS4">\'+
            \'4\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h4"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS5">\'+
            \'5\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h5"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS6">\'+
            \'6\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h6"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS7">\'+
            \'7\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h7"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS8">\'+
            \'8\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h8"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS9">\'+
            \'9\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h9"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS10">\'+
            \'10\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h10"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS11">\'+
            \'11\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h11"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS12">\'+
            \'12\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h12"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS13">\'+
            \'13\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h13"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS14">\'+
            \'14\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h14"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS15">\'+
            \'15\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h15"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS16">\'+
            \'16\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h16"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS17">\'+
            \'17\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h17"].'"/>\'+
        \'</td>\'+

    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MUS18">\'+
            \'18\'+
            \'</label>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<input name="aOdds[]" value="'.$odds["h18"].'"/>\'+
        \'</td>\'+


    \'</tr>\'+
\'</table>\'+
\'</div>\'+
\'<div id="SendB3">\'+
    \'<button id="btn-save-odds" onclick="saveB3Odds()" class="order">保存</button>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "佰个和数";
document.getElementById("sRtype").value = "MUS";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "佰个和数";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB3.install) && self.GameB3.install();
';