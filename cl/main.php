<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link href="css/bcss.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="/js/jquery-1.7.1.js"></script>
    <script language="javascript" src="images/swfobject_source.js"></script>
    <script src="/cl/js/common.js"></script>
    <script language="javascript">
	<?if($_SESSION["agent_id"]!="" && $_GET['action']!="userclick"){
        ?>
        click_url('/cl/reg.php');
        <?
        }?>
    function HotNewsHistory(){
            window.open('/app/member/help/noticle.php','newwindow','menubar=no,status=yes,scrollbars=yes,top=150,left=408,toolbar=no,width=575,height=550');
        }
		function i(ur,w,h){
		document.write('<object id="firstJackpot" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="'+w+'" height="'+h+'"> ');
		document.write('<param name="movie" value="' + ur + '">');
		document.write('<param name="quality" value="high"> ');
		document.write('<param name="wmode" value="transparent"> ');
		document.write('<param name="menu" value="false"> ');
		document.write('<embed src="' + ur + '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="'+w+'" height="'+h+'" wmode="transparent"></embed> ');
		document.write('</object> ');
		} 
		function ii(ur,w,h){
		document.write('<object style="margin-left:-12px;" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="'+w+'" height="'+h+'"> ');
		document.write('<param name="movie" value="' + ur + '">');
		document.write('<param name="quality" value="high"> ');
		document.write('<param name="wmode" value="transparent"> ');
		document.write('<param name="menu" value="false"> ');
		document.write('<embed src="' + ur + '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="'+w+'" height="'+h+'" wmode="transparent"></embed> ');
		document.write('</object> ');
		} 
    </script>
    <script language="JavaScript">
		$(window.parent.parent.document).find("#mainFrame").height(847);
        if(self==top){
            top.location='/';
        }
        function menu_click(id){
            parent.topFrame.document.getElementById("textGlitter"+id).click();
        }
        function page_click(id){
            window.parent.document.getElementById(id).click();
        }
        function mover(o){
            o.style.backgroundPosition='0 bottom';
        }

        function mout(o){
            o.style.backgroundPosition='0 top';
        }
    </script>
	<script language="javascript">
    $(function () {
        if($.cookie("show") == null) {
            $.cookie("show", "yes");
            var dialog = art.dialog({
                padding: 0,
                title: '电子游艺投注1元起返水1.3%最高2.0%无上限',
                content: '<div style="width:630px;height:401px;padding:8px;"><a href="javascript:void(0);" onClick="javascript:menu_url(67);return false"><img src="tpl/images/tips201637.png" /></a></div>',
                cancelVal: '关闭',
                cancel: true //为true等价于function(){}
            });
        }
    });
</script>
    <style>
        #pic_box{ width:960px; overflow:hidden; margin:0 auto; }
        #pic_box a{ 
            display: block;
            float: left;
            width: 240px;
            height: 220px;
         }
         #pic_box .pic_abg1{ background:url(/imgs/game_tyss.png) center top; }
         #pic_box .pic_abg2{ background:url(/imgs/game_zryl.png) center top; }
         #pic_box .pic_abg3{ background:url(/imgs/game_six.png) center top; }
         #pic_box .pic_abg4{ background:url(/imgs/game_cpyx.png) center top; }

         #aBtn{ width:1000px; margin:0 auto; height:97px; line-height:97px; }
         #aBtn a{ float:left; display:inline-block; width:240px; height:40px; margin:30px 0 0 13px; }
         #aBtn .aBtn_1{ background:url(/imgs/btn_mail.png) center top; }
         #aBtn .aBtn_2{ background:url(/imgs/btn_phone.png) center top; }
         #aBtn .aBtn_3{ background:url(/imgs/btn_qq.png) center top; }
         #aBtn .aBtn_4{ background:url(/imgs/btn_service.png) center top; }
         #aBtn a:hover{ background-position:center bottom; }
    </style>
    </head>
    <body id="sy_bg">

<div class="banner" style="width:100% !important;height:847px;background:url(/imgs/container_bg.jpg) repeat-x center 465px;">
  <!-- <div style="float:left;border:solid 9px #333333;">
    <div style="border:solid 1px #202020;">
      <div style="width:980px;height:247px;background-color:#333333;">
        <div id="dv1" class="lpgb">
              <div id="picSwitch" class="picSwitch"><a class="pngfix " target="_self" onclick="click_url('/app/member/sport.php')" href="javascript:void(0);"><img src="/images/001.jpg" border="0" width="971" height="241"></a></div>
            <script type=text/javascript>
                           var focus_width=974;
                           var focus_height=240;
                           var pics='/images/001.jpg|/images/002.jpg|/images/003.jpg|/images/004.jpg'; 
                           var links='|||'; 
                           var s1 = new SWFObject("/images/focusFlash_fp.swf", "mymovie1", focus_width, focus_height, "4", "#ffffff");
                           s1.addParam("wmode", "transparent");
                           s1.addParam("AllowscriptAccess", "sameDomain");
                           s1.addVariable("bigSrc", pics);               
                           s1.addVariable("href", links);
                           s1.addVariable("width", focus_width);
                           s1.addVariable("height", focus_height);
                           s1.write("picSwitch");
                   </script>
        </div>
      </div>
    </div>
    <div style="border: solid 4px #333333;"></div>
    
    
    <div style=" margin-top:10px; background:#333333;">
                  <div style=" margin-left:0;" class="panel_b">
                    <div class="g02"> <a  href="javascript:void(0);" onclick="click_url('/member/zhenren/mylive.php')"> <img alt="" src="/images/g02.jpg"></a>
                      <div class="line_01"></div>
                      <div class="p_cont">
                        <h1>真人娱乐</h1>
                        <div class="line_02"></div>
                        <span>美女荷官，24小时激情不断</span>
                        <div class="line_02"></div>
                        <p>我们种类丰富的在线游戏将让您体验娱乐无限的欢乐感受</p>
                        <a class="btn_start"  href="javascript:void(0);" onclick="click_url('/member/zhenren/mylive.php')"></a> </div>
                    </div>
                  </div>
                  <div class="panel_b">
                    <div class="g03"> <a onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);"> <img alt="" src="/images/g03.jpg"> </a>
                      <div class="line_01"></div>
                      <div class="p_cont">
                        <h1>彩票游戏</h1>
                        <div class="line_02"></div>
                        <span>公平，公正，公开</span>
                        <div class="line_02"></div>
                        <p>最受全球华人喜欢的彩票游戏：时时彩，香港彩，双色球，福彩3D等在线投注方便快捷</p>
                        <a class="btn_start playlotto" onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);"></a> </div>
                    </div>
                  </div>
                  <div class="panel_b">
                    <div class="g04"> <a onclick="click_url('/app/member/sport.php')" href="javascript:void(0);"> <img alt="" src="/images/g04.jpg"> </a>
                      <div class="line_01"></div>
                      <div class="p_cont">
                        <h1>体育投注</h1>
                        <div class="line_02"></div>
                        <span>亚洲最佳体育，每周提供超过5000场赛事</span>
                        <div class="line_02"></div>
                        <p>赛事齐全 玩法丰富 超高水位 半场结算</p>
                        <a class="btn_start" onclick="click_url('/app/member/sport.php')" href="javascript:void(0);"></a> </div>
                    </div>
                  </div>
                </div>
    
    
    
    
    
    <div style="width:982px;height:278px;background-color:#333333;">
    
            <ul id="tabs">
                <li class="first"><a class="m_htm_zr curr1ent" href="javascript:void(0);" onclick="click_url('/member/zhenren/mylive.php')">
                    <img alt="" onmouseout="stoprattle(this)" onmouseover="init(this);rattleimage();" src="/images/bet_M01.jpg" style="left: 0px; top: 0px;">
                </a></li>
                <li><a class="m_htm_dz current" href="javascript:void(0);"  onclick="click_url('/member/lt/')">
                    <img alt="" onmouseout="stoprattle(this)" onmouseover="init(this);rattleimage();" src="/images/bet_M02.jpg" style="left: 0px; top: 0px;">
                </a></li>
                <li><a class="m_htm_cp" onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);">
                    <img alt="" onmouseout="stoprattle(this)" onmouseover="init(this);rattleimage();" src="/images/bet_M03.jpg" style="left: 0px; top: 0px;">
                </a></li>
                <li class="last"><a class="m_htm_ty" onclick="click_url('/app/member/sport.php')" href="javascript:void(0);">
                    <img alt="" onmouseout="stoprattle(this)" onmouseover="init(this);rattleimage();" src="/images/bet_M04.jpg">
                </a></li>
            </ul>
    
    </div>
  </div> -->
<style>
#main_flash{height:465px;}
#main_flash object{position:absolute;top:50%;left:50%;margin-top:-424px;margin-left:-717px;}
</style>
      <div id="main_flash" style="background:url(banner-bg.jpg);width: 100%;">
            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="1434" height="465" >  
            <param name="movie" value="http://180.178.50.154/tpl/amyl/images/banner.swf">  
            <param name="FlashVars" value="prizeResult=3">  
            <param name="quality" value="high">  
            <param name="menu" value="false">  
            <param name="wmode" value="transparent">  
            <param name="allowScriptAccess" value="always">              
            <embed src="banner.swf" autoplay="true" flashvars="prizeResult=3" allowscriptaccess="always" wmode="transparent" menu="false" quality="high" width="100%" height="465" type="application/x-shockwave-flash" pluginspage="http://get.adobe.com/cn/flashplayer/" name="FlashZhuan"> 
         </object>
      </div>
      <div style="width:1020px;height:285px;margin:0 auto;background:url(/imgs/container.jpg) no-repeat;">
                 
				  <div style="clear: both;width:840px; height:30px;margin:0 auto; overflow:hidden;background:url(../imgs/newsbg.png) no-repeat;">
				  <div style="padding: 10px auto; height: 25px; float: left; width: 50px; text-align: center; color: yellow; line-height: 25px;vertical-align: middle;"></div>
				  <div style="float: left; width: 770px; height: 25px; line-height: 25px;vertical-align: middle;color:#fff;">
				  <marquee onclick="HotNewsHistory();" style="cursor:pointer;" scrollamount="2"><?=$msg;?></marquee>
				  </div>
				  </div>
                  <div class="clear"></div>
        
		  <div id="pic_box">
            <a class="pic_abg1" target="_self" onclick="click_url('/app/member/sport.php',1)" href="javascript:void(0);"></a>
            <a class="pic_abg2" onclick="click_url('/member/zhenren/mylive.php')" href="javascript:void(0);"></a>
            <a class="pic_abg3" onclick="click_url('/member/lt/',1)" href="javascript:void(0);"></a>
            <a class="pic_abg4" onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);"></a>
          </div>
      </div>
      <div style="width:100%;height:97px;background:url(../imgs/container_bg1.jpg) repeat-x;">
          <div id="aBtn">
              <a class="aBtn_1" style="margin-left:0;" href="javascript:;"></a>
              <a class="aBtn_2" href="javascript:;"></a>
              <a class="aBtn_3" href="javascript:;"></a>
              <a class="aBtn_4" href="javascript:;"></a>
          </div>
      </div> 
</div>  
  
  
  
  
    
    
<!--<div class="clearfix" id="page-body" style="display:none;">

<div id="head-title-bg">
  <div id="picSwitch" class="picSwitch"></div>
  <script type=text/javascript>
               var focus_width=1000;
               var focus_height=300;
               var pics='/images/001.jpg|/images/002.jpg|/images/003.jpg|/images/004.jpg|/images/005.jpg'; 
               var links='|||||'; 
               var s1 = new SWFObject("/images/focusFlash_fp.swf", "mymovie1", focus_width, focus_height, "5", "#ffffff");
               s1.addParam("wmode", "transparent");
               s1.addParam("AllowscriptAccess", "sameDomain");
               s1.addVariable("bigSrc", pics);               
               s1.addVariable("href", links);
               s1.addVariable("width", focus_width);
               s1.addVariable("height", focus_height);
               s1.write("picSwitch");
            </script>
</div>
<div id="first-btn">
  <div id="first_download" class="first-btn"><a style="background-position: left top; opacity: 1;" onclick="click_url('/cl/reg.php')" href="javascript:void(0);"></a></div>
  <div id="first-event" class="first-btn"><a style="background-position: left top; opacity: 1;" onclick="click_url('/cl/offer.php')" href="javascript:void(0);"></a></div>
  <div id="first-agent" class="first-btn"><a style="background-position: left top; opacity: 1;" href="javascript:alert('请联系在线客服人员！')"></a></div>
  <div id="first-service" class="first-btn"><a style="background-position: left top; opacity: 1;" onclick="BBOnlineService();" href="javascript:void(0);"></a></div>
  <div class="clear"></div>
</div>
<div id="first-bottom-wrap">
  <div id="first-bottom-left">
    <div id="jackpot">
      <script language="javascript" type="text/javascript">i('http://4838.com/cl/tpl/commonFile/swf/prize.swf','185','38')</script>
    </div>
    <div id="Firstnews">
      <marquee height="90" scrollamount="3" scrolldelay="150" direction="up" id="msgNews" onmouseover="this.stop();" onmouseout="this.start();" onclick="HotNewsHistory();" style="cursor: pointer;">
      </marquee>
    </div>
  </div>
  <div id="first-game">
    <div style="background:url(/images/136676841254.jpg);width:125px;height:184px;"> <a onclick="click_url('/app/member/sport.php');" href="javascript:void(0);" style="background: url('/images/136676841036.jpg') repeat scroll left top transparent; width: 125px; height: 184px; opacity: 1;"></a> </div>
    <div style="background:url(/images/136676844402.jpg);width:125px;height:184px;"> <a onclick="click_url('/member/zhenren/mylive.php');" href="javascript:void(0);" style="background: url('/images/136676844184.jpg') repeat scroll left top transparent; width: 125px; height: 184px; opacity: 1;"></a> </div>
    <div style="background:url(/images/136676854575.jpg);width:125px;height:184px;"> <a onclick="click_url('/member/lt/');" href="javascript:void(0);" style="background: url('/images/136676854262.jpg') repeat scroll left top transparent; width: 125px; height: 184px; opacity: 1;"></a> </div>
    <div style="background:url(/images/136676858373.jpg);width:125px;height:184px;"> <a onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);" style="background: url('/images/136676858159.jpg') repeat scroll left top transparent; width: 125px; height: 184px; opacity: 1;"></a> </div>
    <div style="background:url(/images/136676865904.jpg);width:125px;height:184px;"> <a onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);" style="background: url('/images/136676865674.jpg') repeat scroll left top transparent; width: 125px; height: 184px; opacity: 1;"></a> </div>
  </div>
</div>



    </div>-->

<!--<div id="head-title-bg">
    <div id="picSwitch" class="picSwitch"></div>
    <script type=text/javascript>
        $(window.parent.document).find("#mainFrame").height(690);

        var focus_width=1000;
        var focus_height=348;
        var pics='/cl/images/001.jpg|/cl/images/002.jpg|/cl/images/003.jpg|/cl/images/004.jpg|/cl/images/005.jpg';
        var links='|||||';
        var s1 = new SWFObject("/cl/images/focusFlash_fp.swf", "mymovie1", focus_width, focus_height, "5", "#ffffff");
        s1.addParam("wmode", "transparent");
        s1.addParam("AllowscriptAccess", "sameDomain");
        s1.addVariable("bigSrc", pics);
        s1.addVariable("href", links);
        s1.addVariable("width", focus_width);
        s1.addVariable("height", focus_height);
        s1.write("picSwitch");
    </script>
</div>
--> 
<script type="text/javascript">
    $('.ele-firstgame span').hover(
        function(){
            $(this).stop().animate({'opacity': 0}, 650);
        }, function(){
            $(this).stop().animate({'opacity': 1}, 650);
        }
    );
</script>

</body>
<script language="javascript">
    $(function () {
        if($.cookie("show") == null) {
            $.cookie("show", "yes");
            var dialog = art.dialog({
                padding: 0,
                title: '电子游艺投注1元起返水1.3%最高2.0%无上限',
                content: '<div style="width:630px;height:401px;padding:8px;"><a href="javascript:void(0);" onClick="javascript:menu_url(67);return false"><img src="tpl/images/tips201637.png" /></a></div>',
                cancelVal: '关闭',
                cancel: true //为true等价于function(){}
            });
        }
    });
</script>
</html>
