<?php

// připojení do tabulky inzerce


class databaze
{

    public $spojeni;
    public  $promenna;


    public function __construct()
    {
        $servername = "localhost";
        $username = "holanmic";
        $password = "461149";
        $dbname = "holanmic";

        $this->spojeni = mysqli_connect($servername, $username, $password, $dbname);
        //echo "Spojeno";



    }

    public function vlozit($data, $nazev, $isbn_cislo, $rok_vydani, $stari , $lokalita , $text_inzeratu,$doruceni , $cena, $kontakt,$email, $cas)
    {

        $sql = "INSERT INTO inzerce(id,data,nazev,isbn_cislo,rok_vydani,stari,lokalita,text_inzeratu,doruceni,cena,kontakt,email,cas) 
                VALUES('','$data','$nazev','$isbn_cislo','$rok_vydani','$stari','$lokalita','$text_inzeratu','$doruceni','$cena','$kontakt','$email','$cas')";
        $this->spojeni->query($sql);
        echo "Položka byla přidána do inzerce";


    }

    // select obecný , pro index.php - výpis na hlavní stránce
    public function select()
    {

        $knihy = array();

        $sql = "SELECT * FROM inzerce ORDER BY id DESC limit 20";
        $navrat = $this->spojeni = mysqli_query($this->spojeni, $sql);

        if ($navrat->num_rows > 0) {
            $i = 0;

            while ($row = $navrat->fetch_assoc()) {

                $knihy[$i] = new kniha($row["id"], $row["data"], $row["nazev"], $row["isbn_cislo"], $row["rok_vydani"], $row["stari"], $row["lokalita"], $row["text_inzeratu"], $row["doruceni"], $row["cena"], $row["kontakt"],$row["email"], $row["cas"]);
                $i++;
            }
        }
        return $knihy;
    }

    // výpis pro různé kategorie knih dle parametru $data
    public function select_knihy($data)
    {

        $knihy = array();

        $sql = "SELECT * FROM inzerce WHERE data = '$data' ORDER BY id DESC ";
        $navrat = $this->spojeni = mysqli_query($this->spojeni, $sql);

        if ($navrat->num_rows > 0) {


            $i = 0;

            while ($row = $navrat->fetch_assoc()) {

                $knihy[$i] = new kniha($row["id"], $row["data"], $row["nazev"], $row["isbn_cislo"], $row["rok_vydani"], $row["stari"], $row["lokalita"], $row["text_inzeratu"], $row["doruceni"], $row["cena"], $row["kontakt"],$row["email"], $row["cas"]);
                $i++;
            }
        }
        return $knihy;
    }




    // výpis pro jednotlivé přihlášené uživatele v admin. sekci
    public function select_admin($email)
    {

        $knihy = array();

        $sql = "SELECT * FROM inzerce WHERE email = '$email' ORDER BY id DESC ";




        $navrat = $this->spojeni = mysqli_query($this->spojeni, $sql);

        if ($navrat->num_rows > 0) {


            $i = 0;

            while ($row = $navrat->fetch_assoc()) {

                $knihy[$i] = new kniha($row["id"], $row["data"], $row["nazev"], $row["isbn_cislo"], $row["rok_vydani"], $row["stari"], $row["lokalita"], $row["text_inzeratu"], $row["doruceni"], $row["cena"], $row["kontakt"],$row["email"], $row["cas"]);
                $i++;
            }
        }
        return $knihy;
    }







    public function close()
    {

        $this->spojeni->close();

    }


}