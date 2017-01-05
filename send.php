<?php
require_once 'dbconfig.php';
if(isset($_POST['btn-login']))
{
	$umail = $_POST['txt_uname_email'];
	$upass = $_POST['txt_password'];

	if($user->login($umail,$upass))
	{
		$user->redirect('index.php');
	}
	else
	{
		$error = "Špatné přihlašovací údaje!";
	}
}
?>
<!DOCTYPE>

<html>
<head>
	<title>Přidat inzerát|UK Pedf Praha</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">
<div class="wrapper col1">
	<div id="topbar">
		<div id="quickcont">

		</div>
		<div id="search">
			<?php
			include 'login.php';
			?>
		</div>
		<br class="clear" />
	</div>
</div>
<div class="wrapper col2">
	<div id="header">
		<div id="logo">
			<h1><a href="index.php">Bazar knih a skript</a></h1>
			<p>pro UK Pedf Praha</p>
		</div>
		<div id="topnav">
			<ul>
				<li><a href="index.php">Nabídka</a>
					<ul>
						<li><a href="knihy-ucebnice.php">Knihy - učebnice</a></li>
						<li><a href="skripta.php">Skripta</a></li>
						<li class="last"><a href="ostatni-materialy-ke-studiu.php">Ostatní materiály ke studiu</a></li>
					</ul>
				</li>
				<li class="active"><a href="pridat_inzerat.php">Přidat inzerát</a></li>
				<li><a href="registrace.php">Registrace</a></li>
				<li><a href="dotazy.php">Dotazy</a></li>
				<li><a href="vase-inzeraty.php">Vaše inzeráty</a></li>

			</ul>
		</div>
		<br class="clear" />
	</div>
</div>
<div class="wrapper col3">
	<div id="breadcrumb">
		<ul>
			<li class="first">Nacházíte se</li>
			<li>&#187;</li>
			<li class="current"><a href="pridat_inzerat.php">Přidat inzerát</a></li>
		</ul>
	</div>
</div>
<div class="wrapper col4">
	<div id="container">

		<div id="content">
			<h2>Přidat inzerát</h2>


			<?php
			require_once ('databaze.php');


			$data = $_POST["data"];
			$nazev = $_POST["nazev"];
			$isbn_cislo = $_POST["isbn_cislo"];
			$rok_vydani= $_POST["rok_vydani"];
			$stari= $_POST["stari"];
			$lokalita= $_POST["lokalita"];
			$text_inzeratu= $_POST["text_inzeratu"];
			$doruceni= $_POST["doruceni"];
			$cena = $_POST["cena"];
			$kontakt= $_POST["kontakt"];
			$email= $_POST["email"];
			$cas= $_POST["cas"];


			$db = new databaze();
			$db->vlozit($data,$nazev,$isbn_cislo,$rok_vydani,$stari,$lokalita,$text_inzeratu,$doruceni,$cena,$kontakt,$email,$cas);
			$db->close();
			?>



		</div>
		<div id="column">
			<br><br><br><br><br>
			</div>
		<br class="clear" />
	</div>
</div>
<div class="wrapper col5">
	<div id="footer">
		<h2>Odkazy</h2>
		<div class="footbox">
			<h2>Pedagogická fakulta Univerzita Karlova</h2>
			<p><a href="http://www.pedf.cuni.cz/"><img src="images/odkazy/uk.png"></a></p>


		</div>
		<div class="footbox">
			<h2>Webové aplikaec Univerity Karlovy</h2>
			<p> <a href="https://is.cuni.cz/webapps/"><img src="images/odkazy/app.png"></a></p>

		</div>
		<div class="footbox last">
			<h2>Studijní informační systém UK PedF</h2>
			<p> <a href="https://is.cuni.cz/studium/"><img src="images/odkazy/sis.png"></a></p>


		</div>
		<br class="clear" />
	</div>
</div>
<div class="wrapper col6">
	<div id="copyright">
		<p class="fl_left">Copyright &copy; 2016 - Bazar knih a skript
		<p>Pro školní projekt</p>
		<br class="clear" />
	</div>
</div>
</body>
</html>
