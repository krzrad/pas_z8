<?php
	$login = $_POST['user'];
	$password = $_POST['pass'];
	if(IsSet($_POST['user'],$_POST['pass'])){
		if($login=='admin'){
			if($password=='admin'){
				setcookie('admin','admin',time()+3600);
				echo ':)<br><a href="index.php">Wróć</a>';
			} else {
			echo 'Dane logowania nieprawidłowe!<br><a href="login.html">Wróć</a>';
			}
		} else {
			echo 'Dane logowania nieprawidłowe!<br><a href="login.html">Wróć</a>';
		}
	}
?>