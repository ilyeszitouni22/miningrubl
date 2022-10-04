<html lang="ru">
<?php // 
function check_text($text) { 
$arraysql = array('UNION','SELECT','OUTFILE','LOAD_FILE','GROUP BY','ORDER BY','INFORMATION_SCHEMA.TABLES','BENCHMARK','FLOOR','SLEEP','CHAR'); 
$replacesql =''; 
$text2=$text; 
$text2=mb_strtoupper($text2); 
$text2=str_replace($arraysql, $replacesql, $text2,$count); 
if($count!=0){ echo "&#1582;&#1617;и&#1604;ка, &#1612;&#1611;а&#1604;о&#1613;ала защи&#1613;а.<br>&#1583;о&#1606;оз&#1611;&#1607;&#1610;и&#1607; &#1610;а SQL inj или XXS "; exit;} 

$array_find = array("'",'"','/**/','0x','/*','--'); 
$array_replace =''; 
$text=str_replace($array_find, $array_replace, $text); 
return $text; 
} 
foreach($_GET as $i => $value){ $_GET[$i]=check_text($_GET[$i]);} 
foreach($_POST as $i => $value){ $_POST[$i]=check_text($_POST[$i]);} 
foreach($_COOKIE as $i => $value){ $_COOKIE[$i]=check_text($_COOKIE[$i]);} 

?> 
<?php
	include "inc/_statday.php";
?>
<?
$start_counter = microtime(); 
$start_counter_array = explode(" ",$start_counter); 
$start_counter = $start_counter_array[1] + $start_counter_array[0]; 
?>
<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();

$usid = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a WHERE id = '$usid'");
$user_data2 = $db->FetchArray();

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();
	
$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

$user = $user_data2['purse'];
$admin = $user_data2['name'];
$status_user = $user_data2['admin'];

$photochat = array( 0 => "/noavatar.png", 1 => "/admin.png");
$namechat = array( 0 => "&#1583;ользова&#1613;&#1607;ль #$usid", 1 => "$admin");
?>	
<head>
<meta charset="utf-8" />
<title>Online-Mining</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<link rel="stylesheet" id="epcl-shortcodes-css" as="style" onload="this.rel='stylesheet'" href="/assets/features.css" type="text/css" media="all">
<link rel="shortcut icon" href="faviconaa.png">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700|Poppins:400,400i,500,600,700,700i" type="text/css" rel="preload" as="style" onload="this.rel='stylesheet'">
<link rel="stylesheet" href="/assets/style.css" type="text/css">
<link href="assets/dist/style.min.css@v=2d82190c7c" type="text/css" rel="preload" as="style" onload="this.rel='stylesheet'">
<meta name="description" content="Ruble mining, increases the speed of mining and doubled the money" />
<meta name="pushsdk" content="7fabe199483f6f70d9b13bbaa579c253">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="shortcut icon" href="favicona.png" type="image/x-icon" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../js/jquery.js"></script>



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118045411-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118045411-4');
</script> 




</head>
<body class=" home-template" >
<?PHP
$tfstats = time() - 60*60*24;
$db->Query("SELECT 
(SELECT COUNT(*) FROM db_users_a) all_users,
(SELECT SUM(insert_sum) FROM db_users_b) all_insert, 
(SELECT SUM(payment_sum) FROM db_users_b) all_payment,
(SELECT COUNT(*) FROM db_users_a WHERE date_reg > '$tfstats') new_users");
$stats_data = $db->FetchArray();
?>
<?
$usid = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a WHERE id = '$usid'");
$user_data = $db->FetchArray();

$newsus = $user_data["news"];

$numnews = 0;
$db->Query("SELECT * FROM db_news ORDER BY id DESC");
while($newses = $db->FetchArray()){
$numnews = $numnews+1;
}
?>

	<!-- start: #wrapper -->
	<div id="wrapper">

		<!-- start: #header -->
<header id="header">

	<!-- start: .menu-wrapper -->
	<div class="menu-wrapper">
	
		<div class="grid-container">
		
				<div class="logo" ><a href="/"><img src="content/images/2018/10/logo-reco.png" width="200"></a></div>
			
			<!-- start: .main-nav -->
			<nav class="main-nav grid-container grid-parent" role="navigation">
				
				<ul id="menu-header" class="menu">
					<li class="nav-home"><a href="/"> Home</a></li>
					<li class="nav-classic-post"><a href="/about"> About</a></li>
					<li class="nav-fullwidth-post"><a href="/stat"> Payment</a></li>
					<li class="nav-tags-page"><a href="/help"> FAQ</a></li>
					<li class="nav-features"><a href="/rules"> Rules</a></li>
					<li class="nav-404-page"><a href="/contacts"> Contacts</a></li>

				</ul>
				
			</nav>
		
		</div>		
        
		<div class="clear"></div>
		
	</div>
	<!-- end: .menu-wrapper -->
	
	<div class="clear"></div>

</header>

<br>
<div class="old">
<center>
<table width="964" style="border-spacing: 3;
    border-collapse: separate;">
 <tr>
<td align="left">
<! ---- Code of the 1st upper Banner ---->
<div id="linkslot_282585"><script src="https://linkslot.ru/bancode.php?id=282585" async></script></div> </center>
<!------------------------------------->

</td>	
<td align="right">	
<! ---- Code of the 2st upper Banner ---->

<!-- AdRek.Ru Banner code -->
<div id="adrek_4032"></div>
<script src="https://adrek.ru/b.php?id=4032"></script>
<!-- End AdRek.Ru Banner code --> 

<!------------------------------------->

</td>  
</tr>
</table>	
<table width="964" style="border-spacing: 3;
    border-collapse: separate;">
<tr>
<td align="left">
<! ---- Code of the 3st upper Banner ---->
<div id="link_1422_647"><script src="https://linkbum.ru/bcode/468x60_4/1422_647" async></script></div>
<!------------------------------------->

</td>	
<td align="right">
<! ---- Code of the 4st upper Banner ---->
<iframe data-aa="1358838" src="//ad.a-ads.com/1358838?size=468x60" scrolling="no" style="width:468px; height:60px; border:0px; padding:0; overflow:hidden" allowtransparency="true"></iframe>
<!------------------------------------->

</td>  
</tr>

</table>
</center>

</div>


		
	
		</center>
<main <?php if (!$_SESSION["admin"]) : ?>id="page-404"<?php endif;?><?php if ($_SESSION["admin"]) : ?>style="margin-top: 70px;" id="home"<?php endif;?><?php if (!$_SESSION["user_id"]) : ?>id="page-404"<?php endif;?><?php if ($_SESSION["user_id"]) : ?>style="margin-top: 70px;" id="home"<?php endif;?> class="main grid-container" role="main">
<?php if ($_SESSION["admin"]) : ?>
<style>
body { 
    	background: url(mountain.jpg) no-repeat center center fixed;background-size: cover;margin:0;
		font-family: 'Saira Extra Condensed', sans-serif;
		font-weight:400;
		text-align: center;
	}
.nice-select {
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    background-color: none;
    border-radius: 25px;
    border: 3px solid rgba(0, 0, 0, .15);
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    float: left;
    margin-left: 30px;
    font-family: "Roboto", sans-serif;
    letter-spacing: 0.5px;
    font-weight: normal;
    height: 45px;
    line-height: 39px;
    outline: none;
    padding-left: 30px;
    padding-right: 30px;
    position: relative;
    text-align: left!important;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    white-space: nowrap;
    width: auto;
    color: #fff;
}

</style>
<div class="filters">
	<div class="tablet-grid-60">
	  <center>
		<div class="nice-select" onclick="location.href='./?menu=admpnl&sel=stats';">
			<b>&#1585;&#1586;&#1729;&#1586;&#1576;&#1585;&#1586;&#1576;&#1578;&#1729; &#1583;&#1584;&#1582;&#1573;&#1578;&#1586;&#1729;</b>
		</div>
		<div class="nice-select" onclick="location.href='./?menu=admpnl&sel=users';">
			<b>&#1583;&#1582;&#1579;&#1600;&#1575;&#1582;&#1570;&#1729;&#1586;&#1573;&#1579;&#1576;</b>
		</div>
		<div class="nice-select" onclick="location.href='./?menu=admpnl&sel=config';">
			<b>&#1581;&#1729;&#1585;&#1586;&#1584;&#1582;&#1577;&#1578;&#1576;</b>
		</div>
		<div class="nice-select" onclick="location.href='./?menu=admpnl&sel=payments';">
			<b>&#1575;&#1729;&#1578;&#1729;&#1575;&#1594; &#1570;&#1594;&#1583;&#1579;&#1729;&#1586;</b>
		</div>
		<div class="nice-select" onclick="location.href='./?menu=admpnl&sel=outputa';">
			<b>&#1570;&#1594;&#1577;&#1586;&#1576;</b>
		</div>
	  </center>
	</div>
</div>  
<?php endif;?>
<?php if ($_SESSION["user_id"]) : ?>	
<style>
.nice-select:hover{
background-color: yellow;
color: #0114f5;
}
.nice-select {
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    background-color: none;
    border-radius: 25px;
    border: 3px solid rgba(0, 0, 0, .15);
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    float: left;
    margin-left: 30px;
    font-family: "Roboto", sans-serif;
    letter-spacing: 0.5px;
    font-weight: normal;
    height: 45px;
    line-height: 39px;
    outline: none;
    padding-left: 20px;
    padding-right: 20px;
    position: relative;
    text-align: left!important;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    white-space: nowrap;
    width: auto;
    color: #fff;
}
</style>
<div class="filters">
	<div class="tablet-grid-60">
	  <center>
		<div class="nice-select" onclick="location.href='./';">
			<b><i class="fa fa-user"></i> OFFICE</b>
		</div>
		<div class="nice-select" onclick="location.href='./refill';">
			<b><i class="fa fa-plus-circle"></i> SPEED X2</b>
		</div>
                <div class="nice-select" onclick="location.href='./serf';">
			<b><i class="fa fa-rouble"></i> SERFING</b>
		</div>
		<div class="nice-select" onclick="location.href='./balanceout';">
			<b><i class="fa fa-minus-circle"></i> WITHDRAW</b>
		</div>
		<div class="nice-select" onclick="location.href='./bonus';">
			<b><i class="fa fa-gift"></i> BONUS</b>
		</div>
		<div class="nice-select" onclick="location.href='./referrals';">
			<b><i class="fa fa-user-plus"></i> Referrals</b>
		</div>
	  </center>
	</div>
</div>  
<?php endif;?>	
    <div class="content-wrapper">

        <!-- start: .center -->
        <div class="center content">



