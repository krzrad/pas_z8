<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<title>Radowski</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="./ckeditor/ckeditor.js"></script>
</head>
<body>
	<div class="row">
		<div class="col-s-2 col-10 tytul">
		<?php if($_COOKIE['admin']) echo '<a href=obrazek.html>' ?>
			<img alt="Januszex sp. b.o." src="<?php
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
				$result = mysqli_query($con,"SELECT zawartosc from zawartoscStrony where id='obrazek'");
				$rekord = mysqli_fetch_array($result);
				echo $rekord['zawartosc'];
				mysqli_close($con);
			?>">
		<?php if($_COOKIE['admin']) echo '</a>' ?>
		</div>
	</div>
	<div class="row">
		<div class="col-s-1 col-2 menu">
			<ul>
				<li><a id="ofirmie" href="index.php?p=ofirmie">O firmie</a></li>
				<li><a id="kontakt" href="index.php?p=kontakt">Kontakt</a></li>
				<li><a id="dojazd" href="index.php?p=dojazd">Dojazd</a></li>
				<li><a id="oferta" href="index.php?p=oferta">Oferta</a></li>
				<li><a id="czat" href="index.php?p=czat">Czat</a></li>
				<li><?php
					if($_COOKIE['admin']){
						echo '<a href="logout.php">Wyloguj</a>';
					} else {
						echo '<a href="login.html">Login</a>';
					}
				?></li>
			</ul>
		</div>
		<div class="col-s-1 col-8">
				<?php
					$p=$_GET['p'];
					if($p==null)
						$p='default';
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
					$result = mysqli_query($con,"SELECT zawartosc from zawartoscStrony where id='$p'");
					$rekord = mysqli_fetch_array($result);
					if($_COOKIE['admin']){
						if($p!='czat' and $p!='dojazd'){
							echo "<form method=\"post\" action=\"commit.php\">
								<textarea name=\"edit\" id=\"edit\" rows=\"10\" cols=\"80\">
								</textarea>
								<script>CKEDITOR.replace( 'edit' ).setData('".str_ireplace(array("\r\n","\r","\n"),'',$rekord['zawartosc'])."');</script>
								<input type=\"hidden\" name=\"p\" value=".$p.">
								<input type=\"submit\" value=\"Zapisz\">
							</form>";
						} else {
							echo "tego się nie edytuje CKEditorem!";
						}
					} else {
						echo $rekord['zawartosc'];
						mysqli_close($con);
					}
				?>
		</div>
	</div>
</body>