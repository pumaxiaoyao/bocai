<?php
session_start();

include_once("../newbbin2/config.php");


include_once("../app/member/class/user.php");

include_once("../newbbin2/api.class.php");

$uid	=	$_SESSION["userid"];
$loginid=	$_SESSION["uid"];
$userinfo		=	user::getinfo($uid);

$callback	= $_GET["callback"];
$agusername=$userinfo['bb_username'];
$username = $userinfo['user_name'];

if($_GET['u']){
	$agusername=$_GET['u'];
}

if(!empty($agusername)){
	
        $bbinapi = new BBIN_TZH($comId,$comKey,$gamePlatform);
		$balance = $bbinapi->GetBalance($agusername, $agpassword);
		//echo $balance;exit;
	if($balance!==false)
        {
          $json["general"] = sprintf("%.2f",$balance);	

            $sql = "update user_list set bb_money ='$balance' where user_name='$username'";
            $mysqli->query($sql);

        }
            else {
            $json["general"] =0 ;	
            }
	//echo json_encode($json);
//	echo $callback."(".json_encode($json).");";
//	exit; 
	
}else{
	$json["general"]="0.00";
}
//echo $callback."(".json_encode($json).");";
//	exit;
        
         if(isset($_GET['type'])) {
           $ag_money =  $json["general"];}
            else {
            //echo  $json["general"];
			echo json_encode($json);
            }
	exit;
?>
