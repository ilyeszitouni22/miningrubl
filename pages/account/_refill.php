<?PHP
$_OPTIMIZATION["title"] = "&#1059;&#1074;&#1077;&#1083;&#1080;&#1095;&#1077;&#1085;&#1080;&#1077; &#1084;&#1086;&#1097;&#1085;&#1086;&#1089;&#1090;&#1080;";
$usid = $_SESSION["user_id"];
$purse = $_SESSION["purse"];

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();
# &#1052;&#1080;&#1085;&#1080;&#1084;&#1072;&#1083;&#1100;&#1085;&#1072;&#1103; &#1089;&#1091;&#1084;&#1084;&#1072; &#1086;&#1087;&#1083;&#1072;&#1090;&#1099;
$mini = 9; 
$mini2 = 99; 
$mini3 = 499; 
?>
<style>
.grid-33 {
    float: left;
    width: 33.33333%;
}
.mode {
    font-size: 14px;
    color: #111;
    background: #F66;
    display: inline-block;
    padding: 3px 15px;
    vertical-align: top;
    margin-bottom: 5px;
    border-radius: 3px;
}
</style>
		<div class="left-content section grid-70 np-mobile">
			<article>
				<h1 id="page-title" class="title large bordered">Miner acceleration</h1>
				<div class="text textcenter">
<center>
<?
/// &#1054;&#1087;&#1083;&#1072;&#1090;&#1072;
if(isset($_POST["mode1"])){

$sum = round($_POST["mode1"]);

	if($sum > $mini){

# &#1047;&#1072;&#1085;&#1086;&#1089;&#1080;&#1084; &#1074; &#1041;&#1044;
$db->Query("INSERT INTO db_payeer_insert (user_id, purse, sum, date_add) VALUES ('".$_SESSION["user_id"]."','".$_SESSION["purse"]."','$sum','".time()."')");

$desc = base64_encode($_SERVER["HTTP_HOST"]." - ACCOUNT ".$_SESSION["purse"]);
$m_shop = $config->shopID1;
$m_orderid = $db->LastInsert();
$m_amount = number_format($sum, 2, ".", "");
$m_curr = "RUB";
$m_desc = $desc;
$m_key = $config->secretW1;

$arHash = array(
 $m_shop,
 $m_orderid,
 $m_amount,
 $m_curr,
 $m_desc,
 $m_key
);
$sign = strtoupper(hash('sha256', implode(":", $arHash)));

$result = ($sonfig_site['speed'] * $sum);
?>
<center>
					<form method="GET" action="//payeer.com/api/merchant/m.php">
					<input type="hidden" name="m_shop" value="<?=$config->shopID1; ?>">
					<input type="hidden" name="m_orderid" value="<?=$m_orderid; ?>">
					<input type="hidden" name="m_amount" value="<?=number_format($sum, 2, ".", "")?>">
					<input type="hidden" name="m_curr" value="RUB">
					<input type="hidden" name="m_desc" value="<?=$desc; ?>">
					<input type="hidden" name="m_sign" value="<?=$sign; ?>">
					<div class="grid-100">
						<span class="mode" style="width: 40%;"><b style="width: 100%;">SPEED UP</b></span><br>
						<input class="form-control" type="text" style="width: 40%; text-align: center;" value="<?=$sum; ?> RUB" disabled>
						<button class="epcl-shortcode epcl-button regular outline green" style="width: 40%;" name="m_process" type="submit">CONFIRM</button>
						<p><b>Payback 70% per month</b><br>
						Your daily profit <b><?=sprintf("%.8f",$result)*60*60*24; ?> <font color="#f9234b">RUB</font></b><br>The month equals 31 days</p>
					</div>
					</form>
</center>
				</div>			
			</article>
		</div>
<?PHP
	}else echo "<center><div class='epcl-shortcode epcl-box information'><i class='epcl-icon fa fa-info'></i> Minimum deposit amount: 10 RUB</div><a href='/refill' class='epcl-shortcode epcl-button regular outline red'>To return</a></center></div></article></div>";
?>
<?PHP

return;
}
?>
<?
/// &#1054;&#1087;&#1083;&#1072;&#1090;&#1072;
if(isset($_POST["mode2"])){

$sum = round($_POST["mode2"]);

	if($sum > $mini2){

# &#1047;&#1072;&#1085;&#1086;&#1089;&#1080;&#1084; &#1074; &#1041;&#1044;
$db->Query("INSERT INTO db_payeer_insert (user_id, purse, sum, date_add) VALUES ('".$_SESSION["user_id"]."','".$_SESSION["purse"]."','$sum','".time()."')");

$desc = base64_encode($_SERVER["HTTP_HOST"]." - ACCOUNT ".$_SESSION["purse"]);
$m_shop = $config->shopID2;
$m_orderid = $db->LastInsert();
$m_amount = number_format($sum, 2, ".", "");
$m_curr = "RUB";
$m_desc = $desc;
$m_key = $config->secretW2;

$arHash = array(
 $m_shop,
 $m_orderid,
 $m_amount,
 $m_curr,
 $m_desc,
 $m_key
);
$sign = strtoupper(hash('sha256', implode(":", $arHash)));

$result = ($sonfig_site['premium_speed'] * $sum);
?>

<center>
					<form method="GET" action="//payeer.com/api/merchant/m.php">
					<input type="hidden" name="m_shop" value="<?=$config->shopID2; ?>">
					<input type="hidden" name="m_orderid" value="<?=$m_orderid; ?>">
					<input type="hidden" name="m_amount" value="<?=number_format($sum, 2, ".", "")?>">
					<input type="hidden" name="m_curr" value="RUB">
					<input type="hidden" name="m_desc" value="<?=$desc; ?>">
					<input type="hidden" name="m_sign" value="<?=$sign; ?>">
					<div class="grid-100">
						<span class="mode" style="width: 40%;"><b style="width: 100%;">SPEED UP</b></span><br>
						<input class="form-control" type="text" style="width: 40%; text-align: center;" value="<?=$sum; ?> RUB" disabled>
						<button class="epcl-shortcode epcl-button regular outline green" style="width: 40%;" name="m_process" type="submit">CONFIRM</button>
						<p><b>Payback 90% per month</b><br>
						Your daily profit <b><?=sprintf("%.8f",$result)*60*60*24; ?> <font color="#f9234b">RUB</font></b><br> The month equals 31 days</p>
					</div>
					</form>
</center>



		</div>			
			</article>
		</div>
<?PHP
	}else echo "<center><div class='epcl-shortcode epcl-box information'><i class='epcl-icon fa fa-info'></i> Minimum payment for this mode: 100 RUB</div><a href='/refill' class='epcl-shortcode epcl-button regular outline red'>To return</a></center></div></article></div>";
?>
<?PHP

return;
}
?>
<?
/// &#1054;&#1087;&#1083;&#1072;&#1090;&#1072;
if(isset($_POST["mode3"])){

$sum = round($_POST["mode3"]);

	if($sum > $mini3){

# &#1047;&#1072;&#1085;&#1086;&#1089;&#1080;&#1084; &#1074; &#1041;&#1044;
$db->Query("INSERT INTO db_payeer_insert (user_id, purse, sum, date_add) VALUES ('".$_SESSION["user_id"]."','".$_SESSION["purse"]."','$sum','".time()."')");

$desc = base64_encode($_SERVER["HTTP_HOST"]." - ACCOUNT ".$_SESSION["purse"]);
$m_shop = $config->shopID3;
$m_orderid = $db->LastInsert();
$m_amount = number_format($sum, 2, ".", "");
$m_curr = "RUB";
$m_desc = $desc;
$m_key = $config->secretW3;

$arHash = array(
 $m_shop,
 $m_orderid,
 $m_amount,
 $m_curr,
 $m_desc,
 $m_key
);
$sign = strtoupper(hash('sha256', implode(":", $arHash)));

$result = ($sonfig_site['super_speed'] * $sum);
?>
<center>
					<form method="GET" action="//payeer.com/api/merchant/m.php">
					<input type="hidden" name="m_shop" value="<?=$config->shopID3; ?>">
					<input type="hidden" name="m_orderid" value="<?=$m_orderid; ?>">
					<input type="hidden" name="m_amount" value="<?=number_format($sum, 2, ".", "")?>">
					<input type="hidden" name="m_curr" value="RUB">
					<input type="hidden" name="m_desc" value="<?=$desc; ?>">
					<input type="hidden" name="m_sign" value="<?=$sign; ?>">
					<div class="grid-100">
						<span class="mode" style="width: 40%;"><b style="width: 100%;">SPEED UP</b></span><br>
						<input class="form-control" type="text" style="width: 40%; text-align: center;" value="<?=$sum; ?> RUB" disabled>
						<button class="epcl-shortcode epcl-button regular outline green" style="width: 40%;" name="m_process" type="submit">CONFIRM</button>
						<p><b>Payback 120% per month</b><br>
						Your daily profit <b><?=sprintf("%.8f",$result)*60*60*24; ?> <font color="#f9234b">RUB</font></b><br>The month equals 31 days</p>
					</div>
					</form>
</center>


		</div>			
			</article>
		</div>
<?PHP
	}else echo "<center><div class='epcl-shortcode epcl-box information'><i class='epcl-icon fa fa-info'></i> Minimum payment for this mode: 500 RUB</div><a href='/refill' class='epcl-shortcode epcl-button regular outline red'>To return</a></center></div></article></div>";
?>
<?PHP

return;
}
?>
<div class="grid-33">
	<form action="" method="POST">
	<span class="mode"><b style="width: 100%;">INITIAL MODE</b></span><br>
    <input class="form-control" name="mode1" type="text" style="width: 100%; text-align: center;" placeholder="Enter amount" required="">
    <button class="epcl-shortcode epcl-button regular outline blue" style="width: 100%;" type="submit">To pay</button>
	</form>
	<p><small><b>Payback 70% per month</b><br>
	Diposit from <b>10 <font color="#f9234b">RUB</font></b></small></p>
</div>
<div class="grid-33">
	<form action="" method="POST">
	<span class="mode"><b style="width: 100%;">REGULAR MODE</b></span><br>
    <input class="form-control" name="mode2" type="text" style="width: 100%; text-align: center;" placeholder="Enter amount" required="">
    <button class="epcl-shortcode epcl-button regular outline blue" style="width: 100%;" type="submit">To pay</button>
	</form>
	<p><small><b>Payback 90% per month</b><br>
	Diposit from <b>100 <font color="#f9234b">RUB</font></b></small></p>
</div>
<div class="grid-33">
	<form action="" method="POST">
	<span class="mode"><b style="width: 100%;">MAXIMUM MODE</b></span><br>
    <input class="form-control" name="mode3" type="text" style="width: 100%; text-align: center;" placeholder="Enter amount" required="">
    <button class="epcl-shortcode epcl-button regular outline blue" style="width: 100%;" type="submit">To pay</button>
	</form>
	<p><small><b>Payback 120% per month</b><br>
	Diposit from <b>500 <font color="#f9234b">RUB</font></b></small></p>
</div>
<hr>
<p>Your earnings and payback depend on the amount<br /> Calculate the amount you are willing to invest and make a deposit. Payments are automatic.<br></p>
<br>

<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
.under {
  text-decoration: underline red;
}
</style>
</head>
<body>
<h1 class="under">Mining speed table price</h1>
<table id="customers">
  <tr>
      <th>#</th>

    <th>INITIAL MODE</th>
<th>REGULAR MODE</th>
    <th>MAXIMUM MODE</th>
    
  </tr>
 
  <tr>
  <th> Speed Prices</th>
    <td>10 - 99 <b style="color:red;">RUB</b></td>
    <td>99 - 499 <b style="color:red;">RUB</b></td>
    <td> more than 500 <b style="color:red;">RUB</b></td>
  </tr>
   <tr>
  <th> Profit rate</th>
    <td>70 <b style="color:red;">%</b></td>
    <td>90 <b style="color:red;">%</b></td>
    <td> 120 <b style="color:red;">%</b></td>
  </tr>
 
  
</table>

</body>
</html>


				</div>			
			</article>
		</div>