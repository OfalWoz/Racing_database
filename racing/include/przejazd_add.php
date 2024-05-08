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
        $chosen = $_POST['idk'];
        $tor = $_POST['tor'];
        $czas = $_POST['czas'];
        $ilosc = $_POST['ilosc'];
        $data = $_POST['data'];
        if (empty($chosen) && empty($staz) && empty($czas) && empty($ilosc) && empty($data)) {
            echo "<br>Bład wyboru, skontaktuj się z administratorem. [przejazd_add]<br>
            ".$ilosc.", ".$czas." ,".$chosen.",".$tor.",".$data;
        } else {
            //echo $ilosc." , ".$czas." , ".$chosen." , ".$tor." , ".$data;
            $sql = "insert into przejazdy(idp, ilosc, czas, idk, idt, data_przejazdow) values (NULL,".$ilosc.",'".$czas."',".$chosen.",".$tor.",'".$data."');";
            if(!(mysqli_query($conn, $sql))){
                echo "<br>Dodanie nie powiodło się.";
            } else {
                echo "<br>Dodanie powiodło się.";
            }
        }
    } else {
        echo " ";
    }
   