<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "knihy";

$spojeni = mysqli_connect($servername, $username, $password, $dbname);
if (!$spojeni) {
    die("Chyba: " . mysqli_connect_error());
}


$id = $_GET["id"];

$sql="DELETE FROM inzerce WHERE id='$id'";

$result=mysqli_query($spojeni,$sql);


if ($result) {
    echo "Inzerce byla smazána";
    header("Location: vase-inzeraty.php");

} else {
    echo "Chyba: " . mysqli_error($spojeni);
}




?>