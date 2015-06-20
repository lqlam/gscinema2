<?php
	$act = isset($_GET['act']) ? $_GET['act'] : "";
	switch($act)
	{
		case "introduce":
			include "../app/controllers/introduceController.php";
			break;
		case "schedule":
			include "../app/controllers/scheduleController.php";
			break;
		case "tickettable":
			include "../app/controllers/tickettableController.php";
			break;
		case "movielist":
			include "../app/controllers/movielistController.php";
			break;
		case "reviewlist":
			include "../app/controllers/reviewlistController.php";
			break;
		case "movie":
			include "../app/controllers/movieController.php";
			break;
            
		default:
			include "../app/controllers/homeController.php";
			break;
	}
?>