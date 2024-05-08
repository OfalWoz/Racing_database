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
        $nazwa = $_POST['tor'];
        if (empty($nazwa)) {
            echo "<br>Bład wyboru, skontaktuj się z administratorem. [tor_delete]";
        } else {
            $sql = "delete from tor where idt = ".$nazwa.";";
            $sql_przej = "select * from przejazdy where idt= ".$nazwa.";";
            $sql_zaw = "select * from zawody_szczegoly where idt= ".$nazwa.";";
            
            $res_przej = mysqli_query($conn, $sql_przej);
            $res_chceck = mysqli_num_rows($res_przej);

            $res_zaw = mysqli_query($conn, $sql_zaw);
            $res_chceck_zaw = mysqli_num_rows($res_zaw);
            
            if(!(mysqli_query($conn, $sql))){
                echo "<br>Usuwanie nie powiodło się.";
            } else {
                if($res_chceck > 0){
                    $sql = "delete from przejazdy where idt = ".$nazwa.";"; //usuwanie danych przejzdow na torze
                    if(!(mysqli_query($conn, $sql))){
                        echo "<br>Nie udało się usunąć przejazdu.";
                    } 
                }
                if($res_chceck_zaw > 0){
                    $sql = "delete from zawody_szczegoly where idt = ".$nazwa.";"; //usuwanie danych toru z zawodów
                    if(!(mysqli_query($conn, $sql))){
                        echo "<br>Nie udało się usunąć toru z zawodów.";
                    } 
                }
                echo "<br>Usuwanie powiodło się.";
            }
        }
    } else {
        echo " ";
    }
   