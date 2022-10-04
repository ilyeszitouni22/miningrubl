<?php
	$tmptime=time();
	$timeonline=time()-300;
	$usid = $_SESSION["user_id"];
	$usname = $_SESSION["user"];
	$db->Query("SELECT * FROM db_users_a WHERE id = '$usid'");
	$user_data2 = $db->FetchArray();
	$avatar = $user_data2["avaro"];
	$db->Query("DELETE FROM db_statday WHERE time <$timeonline ");
	$db->Query("SELECT * FROM db_statday WHERE name = '$usname' LIMIT 1");
	if($db->NumRows() == 0) {
	if (!empty($usname)) {$usname = $_SESSION["user"];}
	else {$usname='Гость';}
	$db->Query("INSERT INTO db_statday(name, time) VALUES ('$usname','$tmptime') ");
	}
	else
	{
	$db->Query("UPDATE db_statday SET time = '$tmptime' WHERE name = '$usname'");
	}
	?>