

<?PHP
$_OPTIMIZATION["title"] = "Referral system";
$user_id = $_SESSION["user_id"];
$purse = $_SESSION["purse"];
$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id = '$user_id'");
$refs = $db->FetchRow(); // Считаем рефералов 1 уровня
$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id2 = '$user_id'");
$refs2 = $db->FetchRow(); // Считаем рефералов 2 уровня
$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id3 = '$user_id'");
$refs3 = $db->FetchRow(); // Считаем рефералов 3 уровня

$db->Query("SELECT * FROM db_users_a WHERE id = '".$_SESSION['user_id']."'");
$users_info = $db->FetchAssoc();
?>
		<div class="left-content section grid-70 np-mobile">
			<article>
				<h1 id="page-title" class="title large bordered">Referral program</h1>
				<div class="text textcenter">
<center><h4 class="text-success">Invite your friends to the project and get 7% of their contribution to your balance</h4></center>
<center>
	<div class="comments-form">
		<p>YOUR INVITATION LINK</p>
        <input type="text" onclick="this.select()" class="form-control col-lg-4" style="text-align: center;" value="https://<?=$_SERVER['HTTP_HOST']; ?>/?ref=<?=$_SESSION["user_id"]; ?>">
		<small>share your affiliate link with your friends on social networks <br> You were invited to: ID <?=$users_info['referer_id']; ?></small>
	<!-- uSocial -->
<script async src="https://usocial.pro/usocial/usocial.js?v=6.1.4" data-script="usocial" charset="utf-8"></script>
<div class="uSocial-Share" data-lang="en" data-pid="78d9ad462f3a654d4aaea2314a957c09" data-type="share" data-options="round,style1,default,absolute,horizontal,size48,counter0" data-social="fb,lin,telegram,twi,pinterest,tumblr,spoiler" data-mobile="vi,wa,sms"></div>
<!-- /uSocial -->
	</div>
</center>
<br><br>
<center><h4>YOUR PARTNERS</h4></center>	
	<table class="table">
	<thead>
	<tr align="center">
	<th><b>Wallet</b></th>
	<th><b>Income</b></th>
	<th><b>Has come</b></th>
	<th><b>Registration date</b></th>
	</tr>
	</thead>
<tbody>
<?PHP
  $all_money = 0;
  $db->Query("SELECT db_users_a.purse, db_users_a.date_reg, db_users_a.referals, db_users_a.refsite, db_users_b.to_referer FROM db_users_a, db_users_b 
  WHERE db_users_a.id = db_users_b.id AND db_users_a.referer_id = '$user_id' ORDER BY to_referer DESC");
  
	if($db->NumRows() > 0){
  
  		while($ref = $db->FetchArray()){
		
		?>
	<tr align="center">
		<td><?=$ref["purse"]; ?></td>
		<td><?=sprintf("%.2f",$ref["to_referer"]); ?> RUB</td>
		<td><a href="http://<?=$ref["refsite"]; ?>" target="_blank"><?=$ref["refsite"]; ?></a></td>
		<td><?=date("d.m.Y H:i",$ref["date_reg"]); ?></td>
	</tr>
		<?PHP
		$all_money += $ref["to_referer"];
		}
  
	}else echo '<tr><td align="center" colspan="5">You have no referrals</td></tr>'
  ?>
</tbody>
	</table>
				</div>			
			</article>
		</div>













