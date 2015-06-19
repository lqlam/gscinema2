<?php
	$act = isset($_GET['act']) ? $_GET['act'] : "";
	switch($act)
	{
		case "gioithieu":
			include "../app/controllers/gioithieuController.php";
			break;
		case "lichchieu":
			include "../app/controllers/lichchieuController.php";
			break;
		case "banggiave":
			include "../app/controllers/banggiaveController.php";
			break;
		case "phimds":
			include "../app/controllers/phimdsController.php";
			break;
		case "tintucds":
			include "../app/controllers/tintucdsController.php";
			break;
            
		default:
			include "../app/controllers/homeController.php";
			break;
	}
?>