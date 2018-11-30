<?php
	$con = mysqli_connect(
		'sql.kradowskipas.nazwa.pl:3306',
		'kradowskipas_czatbot',
		'Zadanie8',
		'kradowskipas_czatbot'
	);
	if(!$con){
		echo "Błąd połączenia z MySQL!".PHP_EOL;
		echo "Err. no.: ".mysqli_connect_errno().PHP_EOL;
		echo "Error: ".mysqli_connect_error().PHP_EOL;
		exit;
	};
	mysqli_query($con,"SET NAMES utf8");
	mysqli_query($con,"UPDATE zawartoscStrony SET zawartosc='".$_POST['edit']."' where id = 'ofirmie'") 
		or die(mysqli_error($con));
	header ("Location: index.php");
?>