<?PHP
$_OPTIMIZATION["title"] = "Ежедневный бонус";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];

# Настройки бонусов
$bonus_min = 10;
$bonus_max = 100;

?>

		<div class="left-content section grid-70 np-mobile">
			<article>
<h1 id="page-title" class="under" style="font-weight: 600;">Bonus</h1><br>

				<div class="text textcenter">
<center>
The bonus is given once every 24 hours. The bonus amount is determined randomly from <b class="text-danger"><?=$bonus_min/1000;?></b> to <b class="text-success"><?=$bonus_max/1000;?></b> RUB<br />
<div id="linkslot_284289"><script src="https://linkslot.ru/bancode.php?id=284289" async></script></div>
<center><h2><font color="#f9234b" id="bounce"></font></h2></center>
</center>
<div id="btn">
<?PHP
$ddel = time() + 86400;
$dadd = time();
$db->Query("SELECT COUNT(*) FROM db_bonus_list WHERE user_id = '$usid' AND date_del > '$dadd'");

$hide_form = false;

	if($db->FetchRow() == 0){

			$db->Query("DELETE FROM db_bonus_list WHERE date_del < '$dadd'");
			
			# Показывать или нет форму
			if(!$hide_form){
?>
<script type="text/javascript"> 
function showLinks(el,id){var linkBox=document.getElementById(id).style.display='block';el.style.display='none';} 
</script> 
<style type="text/css"> 
.banerBox{cursor:pointer;
width:468px;} 
.myLinkBox{display:none;} 
</style>
<center>
<?
//<div class="banerBox"> 
//<p class="text-muted">Нажмите на баннер для получения бонуса</p>
//<div id="linkslot_284294" onclick="showLinks(this,'linkBox');"><script src="https://linkslot.ru/bancode.php?id=284294" async></script></div>
//</div> 
//<div id="linkBox" class="myLinkBox">
//<button id="bonusform" name="bonus" class="epcl-shortcode epcl-button regular outline green">TAKE A BONUS</button>
//</div>
?>
<button id="bonusform" name="bonus" class="epcl-shortcode epcl-button regular outline green" style="width: 40%;">TAKE A BONUS</button>
<br><br>
</center>
<?PHP 

			}

	}else 
	{
	   // echo "<center><font color = '#b06100'>You have already received the bonus for the last hour</font></center><BR />";
$db->Query("SELECT * FROM db_bonus_list WHERE user_id = '$usid' AND date_del > '$dadd'");
$u_data = $db->FetchArray();
$time = $u_data['date_del'] - $dadd;
$time2 = $u_data['date_del'];
	    ?>
		<hr>
<center><p id="bounce2"><i class="fa fa-clock"></i> Next bonus in <?=date("H:i",$time2); ?></p></center>
		<hr>
        <?php
	}
?>
</div>
					<div class="thw-autohr-bio" id="refr_table">
                      <table style="width: 100%;">
  <?PHP
  
  $db->Query("SELECT * FROM db_bonus_list ORDER BY id DESC LIMIT 20");
  
	if($db->NumRows() > 0){
  
  		while($bon = $db->FetchArray()){
		
		?>
<h4>
<div class="grid-25">
<small>ID<br><span>#<?=$bon["id"]; ?></span></small>
</div>
<div class="grid-25">
<small>Wallet<br><span><?=$bon["purse"]; ?></span></small>
</div>
<div class="grid-25">
<small>Amount<br><span> <?=sprintf("%.2f",$bon["sum"]); ?></span> <font color="#f9234b"><b>RUB</b></font></small>
</div>
<div class="grid-25">
<small>Time<br><span><?=date("H:i",$bon["date_add"]); ?></span></small>
</div>
</h4>
<br><hr>
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="5">No one has received a bonus yet.</td></tr>'
  ?>
                      </table>
					</div>
				</div>			
			</article>
		</div>
<script type="text/javascript">
    $(document).ready(function(){
            $("#bonusform").click(function() {
                $.ajax({
                    url: "../ajax/ajaxbonus.php",
                    type: "POST",
                    success: function(data){
                    if (data) {
					$("#bounce").text(" "+data+" ").addClass("animated bounceIn");
					$("#bounce2").text(" "+data+" ").addClass("animated fadeInUp");
                    $('#refr_table').load('# #refr_table');
					$('#btn').load('# #btn');
					$('#balance').load('# #balance');
                  
                    }else {
                        $("#err").text("error 2");
                    }
                    },
                    error: function(){          
                alert("No data transferred!");          
                }
                });
              
            });
    });
</script>

<style>.under {
  text-decoration: underline red;
}
</style>