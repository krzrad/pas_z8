<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<title>Radowski</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="./ckeditor/ckeditor.js"></script>
</head>
<body>
	<div class="row">
		<div id="col-s-2 col-10">
			<img alt="Januszex sp. b.o." src="januszex.png">
		</div>
	</div>
	<div class="row">
		<div class="col-s-1 col-2">
			<ul>
				<li><a href="ofirmie.html">O firmie</a></li>
				<li><a href="kontakt.html">Kontakt</a></li>
				<li><a href="dojazd.html">Dojazd</a></li>
				<li><a href="oferta.html">Oferta</a></li>
				<li><a href="czat.html">Czat</a></li>
				<li><a href="login.html">Login</a></li>
			</ul>
		</div>
		<div class="col-s-1 col-8">
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