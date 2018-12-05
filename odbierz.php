<?php
	$max_rozmiar = 2000000;
	if (is_uploaded_file($_FILES['plik']['tmp_name']))
	{
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
				mysqli_query($con,"Update zawartoscStrony set zawartosc='".'januszex.'.$ext."' where id='obrazek'");
		if ($_FILES['plik']['size'] > $max_rozmiar) {echo "Przekroczenie rozmiaru $max_rozmiar"; }
		else
		{
			$path = $_SERVER['DOCUMENT_ROOT']."zadanie8".DIRECTORY_SEPARATOR;
			$ext = pathinfo($_FILES['plik']['name'],PATHINFO_EXTENSION);
			switch ($ext){
				case "bmp":
					move_uploaded_file($_FILES['plik']['tmp_name'],
						$path.'januszex.'.$ext);
					mysqli_query($con,
						"Update zawartoscStrony set zawartosc='".'januszex.'.$ext."' where id='obrazek'");
					break;
				case "gif":
					move_uploaded_file($_FILES['plik']['tmp_name'],
						$path.'januszex.'.$ext);
					mysqli_query($con,
						"Update zawartoscStrony set zawartosc='".'januszex.'.$ext."' where id='obrazek'");
					break;
				case "jpg":
					move_uploaded_file($_FILES['plik']['tmp_name'],
							$path.'januszex.'.$ext);
					mysqli_query($con,
						"Update zawartoscStrony set zawartosc='".'januszex.'.$ext."' where id='obrazek'");
					break;
				case "png":
					move_uploaded_file($_FILES['plik']['tmp_name'],
						$path.'januszex.'.$ext);
					mysqli_query($con,
						"Update zawartoscStrony set zawartosc='".'januszex.'.$ext."' where id='obrazek'");
					break;
				default:
					echo "Ten plik nie jest akceptowalny! >:(<br>"
					break;
			}
			
			echo '<a href="index.php">Wróć</a>';
		}
	}
	else {echo 'Błąd przy przesyłaniu danych!<br><a href="obrazek.html">Wróć</a>';}
	mysqli_close($con);
?>