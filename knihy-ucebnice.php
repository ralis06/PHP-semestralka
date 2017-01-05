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
<title>Knihy-učebnice|UK Pedf Praha</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">
<div class="wrapper col1">
  <div id="topbar">
    <div id="quickcont">

    </div>
    <div id="search">
      <form action="#" method="post">

          <input type="text" name="user" placeholder="Prosím, vložte váš e-mail"> <input type="password" name="password" placeholder="Heslo">

          <input type="submit" name="go" id="go" value="Prihlásit se" />
      </form>
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
            <li class="active2"><a href="knihy-ucebnice.php">Knihy - učebnice</a></li>
            <li><a href="skripta.php">Skripta</a></li>
            <li class="last"><a href="ostatni-materialy-ke-studiu.php">Ostatní materiály ke studiu</a></li>
          </ul>
        </li>
        <li><a href="pridat_inzerat.php">Přidat inzerát</a></li>
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
      <li class="current"><a href="knihy-ucebnice.php">Knihy - učebnice</a></li>
    </ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">

    <div id="content">
      <h2>Seznam inzerce</h2>
      <h4>Filtrovat</h4>

     <form method="post" action="filtrovat.php">
      Stav
        <select name="vyber" id="select">
          <option value="Nová">Nová</option>
          <option value="Použitá">Použitá</option>
          <option value="Zničená">Použitá</option>
        </select>

        Lokalita:
        <select name="lokalita">
          <option value="Hlavní město Praha">Hlavní město Praha</option>
          <option value="Středočeský kraj">Středočeský kraj</option>
          <option value="Jihočeský kraj">Jihočeský kraj</option>
          <option value="Plzeňský kraj">Plzeňský kraj</option>
          <option value="Karlovarský kraj">Karlovarský kraj</option>
          <option value="Ústecký kraj">Ústecký kraj</option>
          <option value="Liberecký kraj">Liberecký kraj</option>
          <option value="Královéhradecký kraj">Královéhradecký kraj</option>
          <option value="Pardubický kraj">Pardubický kraj</option>
          <option value="Kraj Vysočina">Kraj Vysočina</option>
          <option value="Jihomoravský kraj">Jihomoravský kraj</option>
          <option value="Olomoucký kraj">Olomoucký kraj</option>
          <option value="Zlínský kraj">Zlínský kraj</option>
          <option value="Moravskoslezský kraj">Moravskoslezský kraj</option>
        </select>

        <input type="submit" name="odeslano" value=Filtrovat />
</form>

      <p>
      <table border="1" color="black">

      <th>Číslo inzerátu</th><th>Čas přidání</th><th>Stav</th><th>Název</th><th>Lokalita</th><th>Cena</th><th>Info</th>

      <?php       // vypsani zaznamu z db - vsechny inzerce

      //include_once ('dbconnect.php');
      require_once ('databaze.php');
      require_once ('kniha.php');

      $db = new databaze();
      $knihy = array();
      $knihy = $db->select_knihy('Kniha-učebnice');
      $db->close();

      foreach ($knihy as $kniha) {
        $kniha->vypis_index();
      }
      ?>
    </table></p>
  </div>
    <div id="column">
      <div class="holder">
     </form>
      </div>
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