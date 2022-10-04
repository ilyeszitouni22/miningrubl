<?PHP
$_OPTIMIZATION["title"] = "Statistic";
$_OPTIMIZATION["description"] = "mining rubles and earn free money online";
$_OPTIMIZATION["keywords"] = "mining,earn,money,earn online,";
?>
		<div class="left-content section grid-70 np-mobile">
			<article>
			<div class="text textcenter">
	<div class="grid-25" style="padding: 5px;">Of people: <br/><div class="widget tag-cloud"><font color="#000000"><b><?=$stats_data["all_users"]+0; ?></b></font></div></div>
	<div class="grid-25" style="padding: 5px;">Work:<br/><div class="widget tag-cloud"><font color="#000000"><b><?=intval(((time() - $config->SYSTEM_START_TIME) / 86400 ) ); ?>-and day</b></font></div></div>
	<div class="grid-25" style="padding: 5px;">Diposit: <br/><div class="widget tag-cloud"><font color="#000000"><b><?=sprintf("%.2f",$stats_data["all_insert"])+0; ?> <?=$config->VAL2; ?></b></font></div></div>
	<div class="grid-25" style="padding: 5px;">Withdraw: <br/><div class="widget tag-cloud"><font color="#000000"><b><?=sprintf("%.2f",$stats_data["all_payment"]); ?> <?=$config->VAL2; ?></b></font></div></div>

<div class="grid-100">
<br>
<center>
<div class="grid-50">
<center><h4>Withdraw</h4></center>
<?PHP

$all_pay_sum=0;
$dt = time() - 60*60*48;
$db->Query("SELECT * FROM db_payment WHERE status = '3' ORDER BY date_add DESC LIMIT 100");
	while($data1 = $db->FetchArray()){
	
	$all_pay_sum += $data1["serebro"]/100;
		
	?>
<tr align="center">
                 <td><?=substr($data1["purse"],0,-3); ?><font color = 'red'>XXX</font></td>
		<td><b><?=sprintf("%.2f",$data1["sum"]); ?> RUB</b></td>
		
	</tr>
	<br>
	<?PHP
	}
?>
</div>

<div class="grid-50">
<center><h4>Diposit</h4></center>
<?PHP	
$db->Query("SELECT * FROM db_insert_money ORDER BY date_add DESC LIMIT 100");
	while($data2 = $db->FetchArray()){
?>
<tr align="center">
		<td><?=substr($data2["purse"],0,-3); ?><font color = 'red'>XXX</font></td>
		<td><b><?=sprintf("%.2f",$data2["money"]); ?> RUB</b></td>
	</tr>
	<br>
	<?PHP
	}
?>
</div>
</center>
</div>

			</div>
			</article>
		</div>