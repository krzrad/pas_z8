<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<title>Radowski</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="./ckeditor/ckeditor.js"></script>
</head>
<body>
	<div id="row">
		<div id="col-s-2 col-10">
			<img alt="Januszex sp. b.o." src="januszex.png">
		</div>
	</div>
	<div id="row">
		<div id="col-s-1 col-2">
			<ul><a href="ofirmie.html">O firmie</ul>
			<ul><a href="kontakt.html">Kontakt</ul>
			<ul><a href="dojazd.html">Dojazd</ul>
			<ul><a href="oferta.html">Oferta</ul>
			<ul><a href="czat.html">Czat</ul>
			<ul><a href="login.html">Login</a></ul>
		</div>
		<div id="col-s-1 col-8">
				<?php
					if($_COOKIE['admin']){
						echo "<form method=\"post\" action=\"commit.php\">
							<textarea name=\"edit\" id=\"edit\" rows=\"10\" cols=\"80\">
						
							</textarea>
							<script>CKEDITOR.replace( 'edit' );</script>
							<input type=\"submit\" value=\"Zapisz\">
						</form>";
					} else {
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
						mysqli_query($con, "SET names utf-8");
						$result = mysqli_query($con,"SELECT zawartosc from zawartoscStrony where id='ofirmie'");
						$rekord = mysqli_fetch_array($result);
						echo $rekord['zawartosc'];
					}
				?>
		</div>
	</div>
</body>