
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
date_default_timezone_set("Europe/Prague");
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
        <?php


        if($user->is_loggedin()!="") {
            $user_id = $_SESSION['user_session'];
            $stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
            $stmt->execute(array(":user_id" => $user_id));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $user_screen = $userRow['user_email'];
            $datum=Date("j/m/Y H:i:s", Time());
           date_default_timezone_set("Europe/Prague");

            echo "
   <h2>Přidat inzerát</h2>
      <form method=\"post\" action=\"send.php\" >
      <p>		Rozdělení:
        <br> <select name=\"data\">
          <option value=\"Kniha-učebnice\">Kniha-učebnice</option>
          <option value=\"Skripta\" >Skripta</option>
          <option value=\"Ostatní\">Ostatní materiál</option>

        </select>      <br><br>



        Název knihy/skript:
        <br><input size=\"70\" type=\"text\" name=\"nazev\" required />  <br>    <br>

        ISBN:
        <br><input size=\"20\" type=\"text\" name=\"isbn_cislo\" />  <br>    <br>

        Rok vydání:
        <br><input size=\"13\" type=\"text\" name=\"rok_vydani\" />  <br>    <br>

        Stav knihy/skript:
        <br><select name=\"stari\" required>
          <option value=\"Nová\">Nová</option>
          <option value=\"Použitá\" >Použitá</option>
          <option value=\"Zničená\" >Zničená</option>
        </select>  <br><br>

        Lokalita:
        <br><select name=\"lokalita\" required>
          <option value=\"Hlavní město Praha\">Hlavní město Praha</option>
          <option value=\"Středočeský kraj\">Středočeský kraj</option>
          <option value=\"Jihočeský kraj\">Jihočeský kraj</option>
          <option value=\"Plzeňský kraj\">Plzeňský kraj</option>
          <option value=\"Karlovarský kraj\">Karlovarský kraj</option>
          <option value=\"Ústecký kraj\">Ústecký kraj</option>
          <option value=\"Liberecký kraj\">Liberecký kraj</option>
          <option value=\"Královéhradecký kraj\">Královéhradecký kraj</option>
          <option value=\"Pardubický kraj\">Pardubický kraj</option>
          <option value=\"Kraj Vysočina\">Kraj Vysočina</option>
          <option value=\"Jihomoravský kraj\">Jihomoravský kraj</option>
          <option value=\"Olomoucký kraj\">Olomoucký kraj</option>
          <option value=\"Zlínský kraj\">Zlínský kraj</option>
          <option value=\"Moravskoslezský kraj\">Moravskoslezský kraj</option>


        </select>

        <br><br>


        <script>
          function count_up(obj) {
            document.getElementById('count1').innerHTML = obj.value.length;
          }

          function count_down(obj) {

            var element = document.getElementById('count2');

            element.innerHTML = 160 - obj.value.length;

            if (160 - obj.value.length < 0) {
              element.style.color = 'red';

            } else {
              element.style.color = 'grey';
            }

          }

        </script>

        Text inzerátu:<br>
        <textarea class=\"form-control\" rows=\"5\" cols=\"53\" onkeyup=\"count_down(this);\" maxlength=\"160\" name=\"text_inzeratu\"></textarea>
        <div id=\"small\">Můžete použít: <span id=\"count2\">160</span> znaků.</div>


          <br><br>

            Způsob doručení:
        <br><input size=\"70\" type=\"text\" name=\"doruceni\" placeholder=\"např.osobní předání v Praze\" />  <br>    <br>

        Cena:
        <br><input size=\"13\" type=\"text\" name=\"cena\" required /> Kč,-  <br>    <br>

        Kontakt:
        <br><input size=\"13\" type=\"text\" name=\"kontakt\" required />  <br>    <br>

    
        <br><input hidden size=\"20\" type=\"text\" name=\"email\" value=\"$user_screen\">
       
      
    <input hidden size= \"20\" type=\"text\" name=\"cas\" value=\"$datum\"/>

        <input type=\"submit\" name=\"odeslano\" value=\"Přidat inzerát\" />
        </form>";

        }

                else
        {
            echo "Pro vstup do této sekce se prosím přihlašte.";
        }

        ?>


    </div>
      <br>    <br> <br>  <br><br>
    <div id="column">

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