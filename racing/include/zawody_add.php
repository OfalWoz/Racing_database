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
        $data = $_POST['data'];
        $nagroda = $_POST['nagroda'];
        if (empty($zawody) && empty($tor) && empty($ilosc)) {
            echo "<br>Bład wyboru, skontaktuj się z administratorem. [zawody_add]";
        }
        if (empty($zawody)) {
            echo "<br>Brak nazwy zawodów";
        } else {
            $sql = "insert into Zawody(idz, nazwa, data, nagroda) values (NULL,'".$zawody."','".$data."','".$nagroda."');";
            if(!(mysqli_query($conn, $sql))) {
                echo "<br>Dodanie nie powiodło się.";
            } else {
                echo "<br>Dodanie powiodło się.";
            }
        }
    } else {
        echo " ";
    }
   