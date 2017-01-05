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
<title>Bazar|UK Pedf Praha</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">
<div class="wrapper col1">
  <div id="topbar">
    <div id="quickcont">
      <?php
      if(isset($error))
      {
      ?>

        Chyba: <?php echo $error; ?>

    <?php
    }
    ?>
    </div>
    <div id="search">
      <?php

      // include login panelu - prihlasit/odhlasit
      include "login.php";

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
        <li><a href="pridat_inzerat.php">Přidat inzerát</a></li>
        <li><a href="registrace.php">Registrace</a></li>
        <li><a href="dotazy.php">Dotazy</a></li>
        <li class="active"><a href="vase-inzeraty.php">Vaše inzeráty</a></li>
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
      <li class="current"><a href="index.php">Nabídka</a></li>
    </ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">

    <div id="content">
      <?php


      if($user->is_loggedin()!="")
      {
        $user_id = $_SESSION['user_session'];
        $stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
        $stmt->execute(array(":user_id"=>$user_id));
        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
        $user_screen = $userRow['user_email'];

echo "
        <h2>Seznam vaší inzerce</h2>
    <p>
    <table border='1' color='black''>

            <th>Číslo inzerátu</th><th>Čas přidání</th><th>Stav</th><th>Název</th><th>Lokalita</th><th>Cena</th><th>Info</th><th>Smazat</th>

";

   // vypsani zaznamu z db - vsechny inzerce

      //include_once ('dbconnect.php');
      require_once ('databaze.php');
      require_once ('kniha.php');

      $db = new databaze();
      $knihy = array();
      $knihy = $db->select_admin($user_screen);

          $db->close();

      foreach ($knihy as $kniha) {
        $kniha->vypis_admin();
      }

       echo" </table></p>";



      }
      else
      {
        echo "
    Pro vstup do této sekce se prosím přihlašte.
      ";
      }

      ?>

      </div>
    </div>
    <div id="column">
          </div>
    <br class="clear" /><br><br><br><br><br>
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