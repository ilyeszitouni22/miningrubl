<?
$_OPTIMIZATION["title"] = "&#1576;&#1612;&#1613;о&#1611;и&#1746; выпла&#1613;";
$usid = $_SESSION["user_id"];
$purse = $_SESSION["purse"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();
$db->Query("SELECT * FROM db_users_a WHERE id = '$usid' LIMIT 1");
$user_data2 = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$config_site = $db->FetchArray();
$status_array = array( 0 => "<span class='text-warning'>&#1583;&#1584;&#1582;&#1570;&#1573;&#1584;&#1603;&#1573;&#1586;&#1585;&#1603;</span>", 1 => "<span class='text-warning'>&#1583;&#1584;&#1582;&#1570;&#1573;&#1584;&#1603;&#1573;&#1586;&#1585;&#1603;</span>", 2 => "<span class='text-danger'>&#1582;&#1586;&#1580;&#1573;&#1581;&#1573;&#1581;</span>", 3 => "<font color='#30a758'><i class='fa fa-check'></i> &#1570;&#1594;&#1583;&#1579;&#1729;Ч&#1573;&#1581;&#1582;</font>", 4 => "<span class='text-warning'>REPEAT</span>");
?>
		<div class="left-content section grid-70 np-mobile">
			<article>
				<h1 id="page-title" class="title large bordered">Surfing sites</h1>
				<div class="text textcenter">
<?PHP
$_OPTIMIZATION["title"] = "Surfing sites";
$user_id = $_SESSION['user_id']; // ?????????? ????????????? ????????????
$api_id = $config->mb_serfing_id; // ????????????? API
$api_key = $config->mb_serfing_key;
$currency = base64_encode($config->mp_serfing_curr); // ???????? ?????? (?????????? ?????? ???. -> ???.)
$db->Query("SELECT ser_per_wmr FROM db_config WHERE id = 1");
$rate = $db->FetchRow(); // ????????? (????? ?? ??????? ????? ???????? ???????? ????????? ????????? ?????????)
$hash = md5("{$api_id}:{$user_id}:{$api_key}");
?>
<script type="text/javascript" src="//api.multibux.org/API_serfing/?iframe&c=<?=$currency;?>&r=<?=$rate;?>&a=<?=$api_id;?>&u=<?=$user_id;?>&h=<?=$hash;?>"></script>
				</div>			
			</article>
		</div>