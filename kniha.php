<?php


class kniha
{

public $id,$data,$nazev,$isbn_cislo, $rok_vydani, $stari, $lokalita, $text_inzeratu, $doruceni, $cena, $kontakt,$email,$cas;


public function __construct($id,$data, $nazev,$isbn_cislo, $rok_vydani, $stari, $lokalita, $text_inzeratu, $doruceni, $cena, $kontakt,$email,$cas)
{
    $this->id = $id;
    $this->data = $data;
    $this->nazev = $nazev;
    $this->isbn_cislo = $isbn_cislo;
    $this->rok_vydani = $rok_vydani;
    $this->stari = $stari;
    $this->lokalita = $lokalita;
    $this->text_inzeratu = $text_inzeratu;
    $this->doruceni = $doruceni;
    $this->cena = $cena;
    $this->kontakt = $kontakt;
    $this->email = $email;
    $this->cas = $cas;
}

    public function vypis_index(){


      echo "<tr><td align='center' width='40px'>$this->id</td><td width='80px'>$this->cas</td><td>$this->stari</td><td>$this->nazev</td><td width='120px'>$this->lokalita</td><td>$this->cena Kč,-</td><td width='80px'><a href=\"javascript:showHide($this->id)\";>Více informací</a></td></tr>";
echo "<tr><td colspan=\"7\" ><div id='$this->id' style=\"display:none\">
<hr>
<b>ISBN:</b>
$this->isbn_cislo <br>
<b>Info:</b>
$this->text_inzeratu <br>

<b>Email: </b>
$this->email <br>
<b>Kontakt:</b>
$this->kontakt <br>
<b>Doručení:</b>
$this->doruceni <br>
<hr>

</div></td></tr>";




}


    public function vypis_admin(){


        echo "<tr><td align='center' width='40px'>$this->id</td><td width='80px'>$this->cas</td><td>$this->stari</td><td>$this->nazev</td><td width='120px'>$this->lokalita</td><td>$this->cena Kč,-</td><td width='80px'><a href=\"javascript:showHide($this->id)\";>Více informací</a></td>
<td width='40px' ><a href='delete.php?id=$this->id'>Smazat</a></td></tr>";
        echo "<tr><td colspan=\"8\" ><div id='$this->id' style=\"display:none\">
<hr>
<b>ISBN:</b>
$this->isbn_cislo <br>
<b>Info:</b>
$this->text_inzeratu <br>

<b>Email: </b>
$this->email <br>
<b>Kontakt:</b>
$this->kontakt <br>
<b>Doručení:</b>
$this->doruceni <br>
<hr>

</div></td></tr>";




    }



}

?>
<script type="text/javascript">
    function showHide(elementid){
        if (document.getElementById(elementid).style.display == 'none'){
            document.getElementById(elementid).style.display = '';
        } else {
            document.getElementById(elementid).style.display = 'none';
        }
    }
</script>
