<?php
	session_start();
    if($_SESSION['device'] == "mobile")
	{
		if($_SESSION['detect'] == "1")
			//header('Location: http://m.gs2.com');
			include_once('indexM.php');
		else
			include_once('indexM.php');
	}
    else        
        include_once('indexD.php');
	//unset($_SESSION['device']);
	//unset($_SESSION['detect']);
?>