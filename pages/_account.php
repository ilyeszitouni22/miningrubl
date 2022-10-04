<?PHP

$_OPTIMIZATION["title"] = "Account";
$_OPTIMIZATION["description"] = "User account";
$_OPTIMIZATION["keywords"] = "Account, personal account, user";

# ���������� ������
if(!isset($_SESSION["user_id"])){ Header("Location: /"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		
		case "404": include("pages/_404.php"); break; // �������� ������
		case "referrals": include("pages/account/_referrals.php"); break; // ��������
		case "farm": include("pages/account/_farm.php"); break; // ��� �����
		case "history": include("pages/account/_history.php"); break; // ��� �����
                case "serf": include("pages/account/_serf.php"); break; // ��� �����
		case "exchange": include("pages/account/_exchange.php"); break; // �������� �����	
		case "balanceout": include("pages/account/_balanceout.php"); break; // ������� ������������
		case "withdraw": include("pages/account/_balanceout.php"); break; // ������� ������������
		case "refill": include("pages/account/_refill.php"); break; // ���������� �������
		case "bonus": include("pages/account/_bonus.php"); break; // ���������� �����
		case "output": @session_destroy(); Header("Location: /"); return; break; // �����
				
	# �������� ������
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/account/_user_account.php");

?>