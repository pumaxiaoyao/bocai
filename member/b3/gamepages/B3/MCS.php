<?php

$odds = odds_lottery_normal::getOdds($lottery_name,"佰拾和数");

echo '
document.getElementById("Game").innerHTML = \'<form id="formB3" name="D3_018" action="/member/quickB3_act.php" method="post" onsubmit="return false">\'+
\'<input type="hidden" name="gid" value="343390"/>\'+
\'<input type="hidden" name="MyRtype" value="MCS"/>\'+
\'<input type="hidden" name="gtype" value="'.$gType.'"/>\'+
\'<input type="hidden" name="gold_gmax" value="'.$maxMoney.'"/>\'+
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
    \'<td>金额</td>\'+
    \'<td>号码</td>\'+
    \'<td>赔率</td>\'+
    \'<td>金额</td>\'+
    \'<td>号码</td>\'+
    \'<td>赔率</td>\'+
    \'<td>金额</td>\'+
    \'<td>号码</td>\'+
    \'<td>赔率</td>\'+
    \'<td>金额</td>\'+
    \'<td>号码</td>\'+
    \'<td>赔率</td>\'+
    \'<td>金额</td>\'+
    \'</tr>\'+
\'<tr>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS0">\'+
            \'0\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS0"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS0" class="odds">\'+
            \''.$odds["h0"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h0"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS0"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS1">\'+
            \'1\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS1"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS1" class="odds">\'+
            \''.$odds["h1"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h1"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS1"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS2">\'+
            \'2\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS2"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS2" class="odds">\'+
            \''.$odds["h2"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h2"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS2"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS3">\'+
            \'3\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS3"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS3" class="odds">\'+
            \''.$odds["h3"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h3"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS3"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS4">\'+
            \'4\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS4"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS4" class="odds">\'+
            \''.$odds["h4"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h4"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS4"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS5">\'+
            \'5\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS5"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS5" class="odds">\'+
            \''.$odds["h5"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h5"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS5"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS6">\'+
            \'6\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS6"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS6" class="odds">\'+
            \''.$odds["h6"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h6"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS6"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS7">\'+
            \'7\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS7"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS7" class="odds">\'+
            \''.$odds["h7"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h7"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS7"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS8">\'+
            \'8\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS8"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS8" class="odds">\'+
            \''.$odds["h8"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h8"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS8"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS9">\'+
            \'9\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS9"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS9" class="odds">\'+
            \''.$odds["h9"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h9"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS9"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS10">\'+
            \'10\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS10"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS10" class="odds">\'+
            \''.$odds["h10"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h10"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS10"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS11">\'+
            \'11\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS11"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS11" class="odds">\'+
            \''.$odds["h11"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h11"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS11"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS12">\'+
            \'12\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS12"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS12" class="odds">\'+
            \''.$odds["h12"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h12"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS12"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS13">\'+
            \'13\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS13"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS13" class="odds">\'+
            \''.$odds["h13"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h13"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS13"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS14">\'+
            \'14\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS14"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS14" class="odds">\'+
            \''.$odds["h14"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h14"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS14"/>\'+
        \'</td>\'+
    \'\'+
    \'</tr>\'+
\'<tr>\'+\'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS15">\'+
            \'15\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS15"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS15" class="odds">\'+
            \''.$odds["h15"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h15"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS15"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS16">\'+
            \'16\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS16"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS16" class="odds">\'+
            \''.$odds["h16"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h16"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS16"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS17">\'+
            \'17\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS17"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS17" class="odds">\'+
            \''.$odds["h17"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h17"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS17"/>\'+
        \'</td>\'+
    \'\'+
    \'<td class="num" style="width:30px">\'+
        \'<label for="MCS18">\'+
            \'18\'+
            \'</label>\'+
        \'<input type="hidden" name="aConcede[]" value="MCS18"/>\'+
        \'</td>\'+
    \'<td class="odds">\'+
        \'<label for="MCS18" class="odds">\'+
            \''.$odds["h18"].'\'+
            \'</label>\'+
        \'<input type="hidden" name="aOdds[]" value="'.$odds["h18"].'"/>\'+
        \'</td>\'+
    \'<td class="odds" style="width:60px">\'+
        \'<input type="text" pattern="[0-9]*" min="0" max="99999999" class="G" name="gold[]" id="MCS18"/>\'+
        \'</td>\'+

    \'</tr>\'+
\'</table>\'+
\'</div>\'+
\'<div id="SendB3">\'+
    \'<span class="credit">下注金额:<b id="total_bet">0.00</b></span>\'+
    \'<input type="button" name="Cancel" value="取消" class="cancel_cen"/>&nbsp;&nbsp;\'+
    \'<input type="button" name="SubmitA" value="确定" class="order"/>\'+
    \'</div>\'+
\'</form>\';
document.getElementById("c_rtype").innerHTML = "佰拾和数";
document.getElementById("sRtype").value = "MCS";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "佰拾和数";
}

$("#YearNum").text("'.$qishu.'");
(self.GameB3.install) && self.GameB3.install();
';