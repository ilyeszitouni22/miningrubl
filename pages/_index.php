<?php if (!$_SESSION["user_id"]) : ?>
			<!-- start: .left-content -->
		<div class="left-content section grid-70 np-mobile">
			<article>
			  <div class="text">

	
<center>
<iframe data-aa="1375038" src="//ad.a-ads.com/1375038?size=728x90" scrolling="no" style="width:728px; height:90px; border:0px; padding:0; overflow:hidden" allowtransparency="true"></iframe>

</center>


				<center>
<marquee behavior="alternate" scrollamount="5" style="color: Lime; font-size: 30px; font-weight: bolder; line-height: 120%; text-shadow: #000000 0px 1px 1px;">WELCOME YOU TO THE PROJECT</marquee>  </a>
				<br><br>


<hr>


	<style>.schet{background:#2aa58c;display:inline-block;padding:14px 15px;vertical-align:top;border-radius:3px;margin-bottom:5px;border-radius:5px}</style>
		<h2 class="schet"><span id="mining_run">0.00000000</span> <font color="#f9234b"><b>RUB</b></font></h2>
		<div style="margin-top: -12px;">
            <small><b>SPEED:</b> <font color="">0.00026100</font> <font color="green">RUB/sec</font> <b> DAILY INCOME:</b> <font color="">*22.55</font> <font color="#f9234b">RUB</font></small><br>
			<small>
				* Income from the calculation of investments in the amount of 1000 rubles in the "Initial" mode

			</small>

<br><br>




<center><img src="/miner.gif" width="700"></center
				<p style="vertical-align: inherit;"><strong>Up4drop </strong> - Will bring you monthly 70%  up to 120% of the investment amount. You can also earn 7% by inviting new members to the project. There is no commission for withdrawal. Funds are transferred to the wallet instantly.</p>
		<p><font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">
<strong>Up4drop </strong> - Mining real money without investments. </font>
<font style="vertical-align: inherit;">
It is very simple, log in using <br>your </font>
</font><b><font color="#1f3139">
<font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">PAY </font></font></font>
<font color="#2791d9"><font style="vertical-align: inherit;">
<font style="vertical-align: inherit;">EER</font></font>
</font></b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> wallet </font>
<font style="vertical-align: inherit;">and you will be taken to your personal account. </font>
<font style="vertical-align: inherit;">You only need to collect and withdraw your accumulated money at least once a month.</font></font></p>



<div>
<hr>

		









        </div>
			<script>(function(){var writeTo=document.getElementById("mining_run");var sec=0;var a=setInterval(function(){sec=sec+0.0002610037037037/10;writeTo.innerHTML=sec.toFixed(8);},100)})();</script>
		</div>




		</div>
			



								<br><center><h3>OUR ADVANTAGES</h3>


				<div class="grid-50">
					<h5 style="margin-bottom: -5px;"><font color="#f9234b">SSL CERTIFICATE</font></h5>
					<small>Your data is sent<br>over a secure connection.</small><br>
					<img style="margin-top: 10px;" src="/images/ssl-certificate.png" width="70">
					<br><br>
					<h5 style="margin-bottom: -5px;"><font color="#f9234b">24/7 SUPPORT</font></h5>
					<small>Our support service is<br>open 24/7.</small><br>
					<img style="margin-top: 10px;" src="/images/communication.png" width="70">
				</div>
				<div class="grid-50">
					<h5 style="margin-bottom: -5px;"><font color="#f9234b">INSTANT PAYMENTS</font></h5>
					<small>Payments are made<br>instantly and without commission</small><br>
					<img style="margin-top: 10px;" src="/images/maps-and-flags.png" width="70">
					<br><br>
					<h5 style="margin-bottom: -5px;"><font color="#f9234b">UNIQUE SCRIPT</font></h5>
					<small>We tried to develop this<br>project and will work as long as possible</small><br>
					<img style="margin-top: 10px;" src="/images/script.png" width="70">
				</div>
				</center>
			  </div>
			</article>
		</div>
<?php endif;?>
<?php if ($_SESSION["user_id"]) : ?>
<?PHP
$_OPTIMIZATION["title"] = "Личный кабинет";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
$db->Query("SELECT * FROM db_users_b WHERE id = '$user_id'");
$user_data = $db->FetchArray();
$db->Query("SELECT * FROM db_users_a WHERE id = '$user_id'");
$user_data2 = $db->FetchArray();
?>
<?
$usid = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();
$last_sbor = $user_data['last_sbor'];

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

$db->Query("SELECT * FROM db_store WHERE user_id  = '$usid' LIMIT 1");
$store_data = $db->FetchArray();

# Вычисление заработка в сутки
$kyr1 = $user_data["speed"]*$sonfig_site["speed"]*60*60*24;
$kyr2 = $user_data["premium_speed"]*$sonfig_site["premium_speed"]*60*60*24;
$kyr3 = $user_data["super_speed"]*$sonfig_site["super_speed"]*60*60*24;
 
$kyrcall = $kyr1+$kyr2+$kyr3;

$time = time();
$sobrano = (time() - $last_sbor);

# Вычисление заработка игрока в секунду
$kyr12 = ($user_data["speed"]*$sonfig_site["speed"])*$sobrano;
$kyr22 = ($user_data["premium_speed"]*$sonfig_site["premium_speed"])*$sobrano;
$kyr32 = ($user_data["super_speed"]*$sonfig_site["super_speed"])*$sobrano;
 
$kyrcall2 = $kyr12+$kyr22+$kyr32;
$summa = sprintf("%.8f",$kyrcall2);

# Увеличение в script
$kyr13 = ($user_data["speed"]*$sonfig_site["speed"]);
$kyr23 = ($user_data["premium_speed"]*$sonfig_site["premium_speed"]);
$kyr33 = ($user_data["super_speed"]*$sonfig_site["super_speed"]);
 
$kyrcall3 = $kyr13+$kyr23+$kyr33;

# Вычисление заработка игрока в секунду
$kyr14 = $user_data["speed"]*$sonfig_site["speed"];
$kyr24 = $user_data["premium_speed"]*$sonfig_site["premium_speed"];
$kyr34 = $user_data["super_speed"]*$sonfig_site["super_speed"];
 
$kyrcall4 = $kyr14+$kyr24+$kyr34;
?>

			<!-- start: .left-content -->
		<div class="left-content section grid-70 np-mobile">
			<article>


				<h1 id="page-title" class="title large bordered">Personal Area</h1>


				<div class="text textcenter">
				<center>
<style>
.under {
  text-decoration: underline red;
}
.schet {
    background: #f5f5f5;
    display: inline-block;
    padding: 14px 15px;
    vertical-align: top;
    margin-bottom: 5px;
    border-radius: 3px;
}
.mode {
    font-size: 14px;
    color: #111;
    background: #ffd012;
    display: inline-block;
    padding: 3px 15px;
    vertical-align: top;
    margin-bottom: 5px;
    border-radius: 25px;
}
* {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
		<h2 class="schet"><span id="resu"></span><span id="hid"><span id="mining_run"><?=sprintf("%.8f",$kyrcall2); ?></span></span> <font color="#f9234b"><b>RUB</b></font></h2>
		<div id="main">
		<div style="margin-top: -12px;">
            <small><b>YOUR SPEED: </b> <font color=""><?=sprintf("%.8f",$kyrcall4); ?> </font><font color="green">RUB/sec</font><br /> <b>YOUR DAILY INCOME: </b> <font color=""><?=sprintf("%.2f",$kyrcall); ?> </font><font color="red">RUB</font></small><br>
        </div>
<script>
(function () {
	var writeTo = document.getElementById("mining_run");
	var sec = <?=$kyrcall2; ?>;
	var a = setInterval(function () {
		sec = sec + <?=$kyrcall3/10; ?>;
		writeTo.innerHTML = sec.toFixed(8);
	}, 100)
})();
</script>
		<button class="epcl-shortcode epcl-button regular outline green" style="width: 40%; margin-top: 10px;" id="sbor">GET PROFIT</button>
		</div>
		<br>
		<h3>YOUR INVESTMENT</h3><br>
<div class="grid-33">
	<span class="mode"><b style="width: 100%;">INITIAL MODE</b></span><br>
    <input class="form-control" name="mode1" type="text" style="width: 100%; text-align: center;" value="<?=$user_data['speed']; ?> RUB" disabled>
	<p><small>Payback up to <font color="#FF0000">70%</font> per month<br>
	Income per month <b><?=sprintf("%.2f",sprintf("%.8f",$kyr14)*60*60*24*31); ?> <font color="#f9234b">RUB</font></b></small></p>
</div>
<div class="grid-33">
	<span class="mode"><b style="width: 100%;">REGULAR MODE</b></span><br>
    <input class="form-control" name="mode2" type="text" style="width: 100%; text-align: center;" value="<?=$user_data['premium_speed']; ?> RUB" disabled>
	<p><small>Payback up to <font color="#FF0000">90%</font> per month<br>
	Income per month <b><?=sprintf("%.2f",sprintf("%.8f",$kyr24)*60*60*24*31); ?> <font color="#f9234b">RUB</font></b></small></p>
</div>
<div class="grid-33">
	<span class="mode"><b style="width: 100%;">MAXIMUM MODE</b></span><br>
    <input class="form-control" name="mode3" type="text" style="width: 100%; text-align: center;" value="<?=$user_data['super_speed']; ?> RUB" disabled>
	<p><small>Payback up to <font color="#FF0000">120%</font> per month<br>
	Income per month <b><?=sprintf("%.2f",sprintf("%.8f",$kyr34)*60*60*24*31); ?> <font color="#f9234b">RUB</font></b></small></p>


</div>
<p>Your monthly income: <b><?=sprintf("%.2f",sprintf("%.8f",$kyrcall4)*60*60*24*31); ?> <font color="red">RUB</font></b></p>
				</center>
				</div>
			</article>

		</div>
<script type="text/javascript">
    $(document).ready(function(){
            $("#sbor").click(function() {
                $.ajax({
                    url: "../ajax/ajaxmining.php",
                    type: "POST",
                    success: function(data){
					$("#resu").text(" "+data+" ");
                    $('#hid').hide(0,function(){
					$('#balance').load('# #balance');
					$('#main').load('# #main');
					});
                    },
                    error: function(){          
                alert("Данные не переданы!");          
                }
                });
              
            });
    });
</script>
<?php endif;?>








