<?php
class Auth extends Controller{
	
	function __construct() {
        parent::__construct();
    }
    
	function index(){
		echo '
			<html>
			<head>
				<script src="lib/jquery-2.1.1.min.js"></script>
				<style scoped>
					body{font-family:arial;font-size:12px;}
					input{border:none;background:transparent;width:200px;height:30px;font-size:14px;color:#fff;margin:0;padding:0;outline:none;text-indent:5px}
					button{border:none;color:#EAEAEA;cursor:hand;width:100px;height:30px;color:#000;border-top-right-radius:10px;border-bottom-right-radius:10px;}
					.inline > span{float:left;background-color:#666;height:30px;}
					::-webkit-input-placeholder {color: #aaa;}
				</style>
			</head>
			<body style="background-image:url(../img/bg.jpg);">
			
			<div style="position:absolute;left:50%;top:50%;z-index:9999;width:0;height:0;">
				<div style="position:relative;left:-250px;top:100px;width:600px;height:40px;" class="inline">
					<span style="border-top-left-radius:10px;border-bottom-left-radius:10px;"><input id="username" type="text" placeholder="Username"></span>
					<span><input id="password" type="password" placeholder="Password"></span>
					<span style="border-top-right-radius:10px;border-bottom-right-radius:10px;"><button id="btn-login">LOGIN</button></span>
				</div>
			</div>
			
			<div style="position:absolute;left:50%;top:50%;width:0;height:0;">
				<div style="position:relative;left:-100px;top:-200px;background-image:url(../img/logo.jpg);width:200px;height:273px;background-size:200px 273px;"></div>
			</div>
		';
		
		echo '
			<script>
			
			$("#btn-login").click(function(){
				$.ajax({type:"post", url:"/index.php/auth/login",
					data:{ form:{username:$("#username").val(), password:$("#password").val()} } }).done(function(r){
						document.cookie = "username = "+r;
						location.href = "/";
				});
			});
			</script>
			
			</body>
			</html>
		';
		
	}
	
	function login(){
		$cnn = mysql_connect('localhost', 'root', 'password');
		mysql_select_db('aksk', $cnn);
		
		$form = $_POST['form'];
		
		$r = mysql_query('SELECT * FROM user WHERE username="'.$form['username'].'" AND password="'.$form['password'].'"');
				
		if(mysql_affected_rows($cnn)){			
			$row = mysql_fetch_assoc($r);			
			$_SESSION['user_granted'] = true;
			echo $form['username'];
		}	
	}
	
	function logout(){
		unset($_SESSION['user_granted']);
		header('location:/');
	}
}