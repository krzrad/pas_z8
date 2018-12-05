<?php
	$q=strtolower(str_ireplace(array('.',';',',',' '),'',$_POST['q']));
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
	mysqli_query($con, "SET names utf8");
	$result = mysqli_query($con,"SELECT odpowiedz from bazaZapytan WHERE zapytanie = '".$q."'") or die (mysqli_error($con));
	if(mysqli_num_rows($result)!=0)while($row = mysqli_fetch_array($result)){
		echo "<b>BOT:</b> ".$row['odpowiedz'];
	} else if($q=='?' or $q=='h'){
		$options = "";
		$result = mysqli_query($con,"SELECT zapytanie from bazaZapytan") or die (mysqli_error($con));
		while($row = mysqli_fetch_array($result)){
			$options.=$row['zapytanie'];
			$options.="<br>";
		}
		echo "<b>BOT:</b> ".$options;
	} else {
		$wybor = rand(0,1);
		switch($wybor){
			case 0:
				$c = "kontakt";
				break;
			case 1:
				$c = "oferta";
				break;
		}
		$result = mysqli_query($con,"SELECT odpowiedz from bazaZapytan WHERE zapytanie = '".$c."'") or die (mysqli_error($con));
		while($row = mysqli_fetch_array($result)){
			echo "<b>BOT:</b> Panie, nie rozumiem \"$q\" Ale wiem coś innego:<br>".$c.":<br>".$row['odpowiedz'];
		}
	}
	mysqli_close($con);
?>