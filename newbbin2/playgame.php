<?php
header("Content-type: text/html; charset=utf-8");
include_once '../newbbin2/config.php';
include_once("../app/member/class/user.php");
require_once '../newbbin2/api.class.php';
error_reporting(E_ALL);
ini_set( 'display_errors', 'Off' );
session_start();
/*$username = $_SESSION["username"];
$uid     = $_SESSION["uid"];*/

$uid	=	$_SESSION["userid"];
$loginid=	$_SESSION["uid"];

if(!$uid){
    echo "<script>alert('请先登录再进入BBIN');location.href='..';</script>";
    exit;
}
$userinfo		=	user::getinfo($uid);
$username = $userinfo['user_name'];
$sql = "select * from user_list where user_name = '$username'";
$result = $mysqli->query($sql);
$row = $result->fetch_array();
$bbinapi = new BBIN_TZH($comId, $comKey,$gamePlatform);
$agusername = $row["bb_username"];
if($agusername==""){     // 账号不存在时，创建新账号
    $agusername = $top_pre.randomnames(6);
    if(!$bbinapi->GameUserRegister($agusername, $agpassword)){ // 创建失败
       echo "<script>alert('请联系管理员开通BBIN账号');</script>";
       exit;
    }  else {
    $sql = "update user_list set bb_username = '$agusername',bb_password = '$agpassword' where user_name = '$username'";
    $mysqli->query($sql);
    }         
}  

 
 $gameid = $_GET['id'];

//echo $bbinapi->GameUserLogin($agusername);exit;
 if(!($url = $bbinapi->GameUserLogin($agusername)))  // login
 {
      echo "<script>alert('进入游戏失败，请秒后再试');</script>";
      exit;
 }

if($gameid){
	$url = 'http://888.room88.net/app/member/game/Game.php?lang=zh-cn&HALLID=3081976&GameType='.$gameid.'&VerID=f72ecd1be4d54968944879ae356491c9';
		
}else{

}
// header("Location:$url");
//echo $url;exit;
 ?>
 <html>
    <head>
        <meta charset="UTF-8">
        <title>BBIN</title>
        <style>
            body,iframe {margin: 0px;height: 100%;width: 100%;background-color: #000;}

        </style>
    </head>
    <body scroll='no' style="overflow-y: hidden">
        <?php
        if($url)
        {
        ?>
        <iframe id='fr' frameborder="0" src="<?php echo $url; ?>" sandbox="allow-forms allow-scripts allow-same-origin" ></iframe>
        
        <script type="text/javascript">
            function a(){
                var dom=document.getElementById('fr');
                //dom.src="http://777.tzh2.com/";
                location.href="http://777.room88.net/cl/index.php?module=System&method=Livetop###";
            }
            setTimeout('a()',3000);
        </script>

        <?php
        }  else {
        echo "进入游戏失败，请秒后再试";    
        }
        ?>
    </body>
</html>