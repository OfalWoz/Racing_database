<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css.css">
        <title>Racing Center</title>
    </head>
    <body><center>
    <h1>Racing Center Los Santos</h1>
    <a href="../"><input type="button" value="Home"></a>
<?php
    include_once "dbh.inc.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $zawody = $_POST['zawody'];
        $tor = $_POST['tor'];
        $ilosc = $_POST['ilosc'];
        if (empty($zawody) && empty($tor) && empty($ilosc)) {
            echo "<br>Bład wyboru, skontaktuj się z administratorem. [tor_zawody_add]";
        }
        if (empty($ilosc)) {
            echo "<br>Nie podano ilosci wyścigów.";
        } else {
            $sql = "insert into zawody_szczegoly(idsz, idz, idt, ilosc_wyscigow) values (NULL,".$zawody.",".$tor.",".$ilosc.");";
            if(!(mysqli_query($conn, $sql))) {
                echo "<br>Dodanie nie powiodło się.";
            } else {
                echo "<br>Dodanie powiodło się.";
            }
        }
    } else {
        echo " ";
    }
   