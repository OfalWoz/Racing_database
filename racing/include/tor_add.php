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
        $nazwa = $_POST['chosen'];
        $dlugosc = $_POST['dlugosc'];
        $zakrety = $_POST['zakrety'];
        if (empty($nazwa) && empty($staz)) {
            echo "<br>Bład wyboru, skontaktuj się z administratorem. [tor_add]";
        }
        if (empty($nazwa)) {
            echo "<br>Brak nazwy toru.";
        } else {
            $sql = "insert into tor(idt, Nazwa, dlugosc, zakrety) values (NULL,'".$nazwa."',".$dlugosc.",".$zakrety.");";
            if(!(mysqli_query($conn, $sql))) {
                echo "<br>Dodanie nie powiodło się.";
            } else {
                echo "<br>Dodanie powiodło się.";
            }
        }
    } else {
        echo " ";
    }
   