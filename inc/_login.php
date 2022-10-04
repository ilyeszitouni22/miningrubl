        <!-- start: #sidebar -->
        <aside id="sidebar" role="complementary" class="grid-30">
<?php if (!$_SESSION["user_id"]) : ?>
            <!-- start: .recent-articles -->
            <div class="widget recent-articles">
			  <form action="" method="post">
                <h3 class="title bordered">Login</h3>

<?
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();
$date = time();
$ip = $func->UserIP;
$ipregs = $db->Query("SELECT * FROM `db_users_a` WHERE INET_NTOA(db_users_a.ip) = '$ip' ");
$ipregs = $db->NumRows();
$referer_id = (isset($_COOKIE["i"]) AND intval($_COOKIE["i"]) > 0 AND intval($_COOKIE["i"]) < 1000000) ? intval($_COOKIE["i"]) : 1;
$referer_purse = "";
						if($referer_id != 0){
						
							$db->Query("SELECT purse FROM db_users_a WHERE id = '$referer_id' LIMIT 1");
							
							if($db->NumRows() > 0){
							
								$referer_purse = $db->FetchRow();
							
							}else{ $referer_id = 0; $referer_purse = "-"; }
						
						}else{ $referer_id = 0; $referer_purse = "-"; }
						
	if(isset($_POST["login"])){
	
	$purse = $func->CheckPurse($_POST["login"]);
	
		if($purse !== false){
			
		$db->Query("SELECT * FROM db_users_a WHERE purse = '$purse'");			
		$log_data = $db->FetchArray();
			
			# &#1055;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1072; &#1085;&#1072; &#1089;&#1091;&#1097;&#1077;&#1089;&#1090;&#1074;&#1091;&#1102;&#1097;&#1080;&#1077; &#1072;&#1082;&#1082;&#1072;&#1091;&#1085;&#1090;&#1099;
			$db->Query("SELECT COUNT(*) FROM db_users_a WHERE purse = '$purse'");
			if($db->FetchRow() == 0){
				
			  if($ipregs == 0) {

						/* &#1056;&#1077;&#1092; 3 &#1091;&#1088;&#1086;&#1074;&#1085;&#1103; ================== */
                        $db->Query("SELECT purse, referer_id FROM db_users_a WHERE id = '$referer_id' LIMIT 1");
                        $stats_data = $db->FetchArray();
                        $referer_purse=$stats_data["purse"];
                        $referer_id2=$stats_data["referer_id"];

                        $db->Query("SELECT purse, referer_id FROM db_users_a WHERE id = '$referer_id2' LIMIT 1");
                        $stats_data3 = $db->FetchArray();
                        $referer_purse=$stats_data3["purse"];
                        $referer_id3=$stats_data3["referer_id"];
                        /* ================== */


						preg_match('/([a-z0-9a&#1072;-&#1103;\.])+([a-z0-9&#1072;-&#1103;\-])+(\.)([a-z0-9&#1072;-&#1103;]{2,5}\.)?([a-z0-9&#1072;-&#1103;]{2,5})/i',$_COOKIE['rsite'], $out);
                        $out=$db->RealEscape($out[0]);
                        
						# &#1056;&#1077;&#1075;&#1072;&#1077;&#1084; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1103;
						$db->Query("INSERT INTO db_users_a (purse, referer, referer_id, referer_id2, referer_id3, date_reg, refsite, ip) 
						VALUES ('$purse','$referer_purse','$referer_id','$referer_id2','$referer_id3','".time()."','$out',INET_ATON('$ip'))");
						
						$lid = $db->LastInsert();
						
						$db->Query("INSERT INTO db_users_b (id, purse, speed, money, last_sbor) VALUES ('$lid','$purse','0','0','".time()."')");

						$db->Query("SELECT * FROM db_users_a WHERE id = '$lid'");			
						$log_data = $db->FetchArray();
						$db->Query("UPDATE db_users_a SET date_login = '".time()."', ip = INET_ATON('".$func->UserIP."') WHERE id = '".$log_data["id"]."'");
						
						$_SESSION["user_id"] = $log_data["id"];
						$_SESSION["purse"] = $log_data["purse"];
						$_SESSION["referer_id"] = $log_data["referer_id"];
						header("Location: /");
						
			   }else echo "<center><div class='epcl-shortcode epcl-box notice'><i class='epcl-icon fa fa-info'></i>Your device has already been registered!</div></center>";
				
			}else if($log_data["purse"] == 0){
				
				if($log_data["banned"] == 0){
						
						# &#1057;&#1095;&#1080;&#1090;&#1072;&#1077;&#1084; &#1088;&#1077;&#1092;&#1077;&#1088;&#1072;&#1083;&#1086;&#1074;
						$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id = '".$log_data["id"]."'");
						$refs = $db->FetchRow();
						
						$db->Query("UPDATE db_users_a SET referals = '$refs', date_login = '".time()."' WHERE id = '".$log_data["id"]."'");
						
						$_SESSION["user_id"] = $log_data["id"];
						$_SESSION["purse"] = $log_data["purse"];
						$_SESSION["referer_id"] = $log_data["referer_id"];
						header('Location: /'); 
						
				}else echo "<center><div class='epcl-shortcode epcl-box error'><i class='epcl-icon fa fa-warning'></i> account is blocked</div></center>";
			}
			
		}else echo "<center><div class='epcl-shortcode epcl-box notice'><i class='epcl-icon fa fa-info'></i>Invalid wallet format</div></center>";
	
	}
$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();
?>
				
<center>Enter wallet <b><font color="#1f3139">PAY</font><font color="#2791d9">EER</font></b></center>
                <input type="text" name="login" class="form-control" placeholder="P123456789" required>
				<button type="submit" class="epcl-shortcode epcl-button regular outline red" style="width: 50%;">Login</button> <a href="https://payeer.com/ru/auth/?register=yes" target="_blank" style="margin-left: 7px;"><font color="#4f87ff"> Create wallet</font></a>
			  </form>

            </div>
            <!-- end: .recent-articles -->
<?php endif;?>
<?php if ($_SESSION["user_id"]) : ?>
<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
$db->Query("SELECT * FROM db_users_b WHERE id = '$user_id'");
$user_data = $db->FetchArray();
$db->Query("SELECT * FROM db_users_a WHERE id = '$user_id'");
$user_data2 = $db->FetchArray();
?>
<style>
.balanc {
    font-size: 19px;
    background: #f5f5f5;
    display: inline-block;
    padding: 0px 15px;
    vertical-align: top;
    margin-bottom: 10px;
    border-radius: 3px;
     color: black;
}
</style>
            <div class="widget recent-articles">
			  <div class="text textcenter">
				<h2><?=$user_data2['purse']; ?> <font color="#FF3152"><i class="fa fa-wallet"></i></font></h2>
				<span class="balanc" style="width: 90%;"><span style="float: left;">BALANCE</span> <span style="float: right;" id="balance"><b><?=sprintf("%.2f",$user_data['money']); ?></b> <font color="#f9234b"><b>RUB</b></font></span></span>
				<span></span>
				<a href="/output" class="epcl-shortcode epcl-button regular outline red" style="width: 85%;"><i class="fa fa-sign-out-alt"></i> logout</a>
			  </div>
            </div>




<?php endif;?>

<!-- AdRek.Ru Links code -->
<center><a href="https://adrek.ru/buyrm.php?lid=3250" target="_blank">Buy here a link for 2 rubles.</a>
<div id="adrek_3250" style="margin-top:10px;"></div></center>
<script src="https://adrek.ru/l.php?id=3250"></script>
<!-- End AdRek.Ru Links code -->
<br><nr><hr>


<style>
.badgeet a, .badgeet span, div.tags a, div.tags span {
    font-size: 13px;
    color: #ffd012;
    background: #ffd012;
    display: inline-block;
    padding: 3px 15px;
    vertical-align: top;
	border: 1px solid #666;
    margin-bottom: 5px;
    margin-left: 5px;
    border-radius: 25px;
}
</style>
            <!-- start: .recent-articles -->
            <div class="widget recent-articles badgeet">
                 <h3 class="title bordered">Statistics</h3>
				<div class="text">
      <p><i class="fa fa-users"></i> users: <span style="float: right;"><font color="#000000"><b><?=$stats_data["all_users"]; ?></b></font></span></p>
				<p style="margin-top: -25px;"><i class="fa fa-cloud"></i> Reserve: <span style="float: right;"><font color="#000000"><b><?=($stats_data["all_insert"]-$stats_data["all_payment"])+50000; ?> RUB</b></font></span></p>
				<p style="margin-top: -25px;"><i class="fa fa-cloud-upload-alt"></i> Diposit: <span style="float: right;"><font color="#000000"><b><?=$stats_data["all_insert"]; ?> <?=$config->VAL2; ?></b></font></span></p>
				<p style="margin-top: -25px;"><i class="fa fa-cloud-download-alt"></i> Withdraw: <span style="float: right;"><font color="#000000"><b><?=$stats_data["all_payment"]; ?> <?=$config->VAL2; ?></b></font></span></p>
                                <p style="margin-top: -25px;"><i class="fa fa-clock"></i> Online <span style="float: right;"><font color="#000000"><b><?=intval(((time() - $config->SYSTEM_START_TIME) / 86650 ) ); ?>-Day</b></font></span></p>
				
</div>
            </div>


<br>


 



        </aside>
 <div class="link"style="float: right;
    margin-right: 70px;">
    
	 
   <div id="linkslot_282611"><script src="https://linkslot.ru/bancode.php?id=282611" async></script></div>

    
	<br>

</div>

        <!-- end: #sidebar -->

<style>.under {
  text-decoration: underline red;
}
</style>