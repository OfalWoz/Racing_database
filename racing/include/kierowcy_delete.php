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
        $nazwa = $_POST['kierowcy'];
        if (empty($nazwa)) {
            echo "<br>Bład wyboru, skontaktuj się z administratorem. [kierowcy_delete]";
        } else {
            $sql = "delete from kierowcy where idk = ".$nazwa.";";
            $sql_przej = "select * from przejazdy where idk= ".$nazwa.";";
            $res = mysqli_query($conn, $sql_przej);
            $res_chceck = mysqli_num_rows($res);
            
            if(!(mysqli_query($conn, $sql))){
                echo "<br>Usuwanie nie powiodło się.";
            } else {
                if($res_chceck > 0){
                    $sql = "delete from przejazdy where idk = ".$nazwa.";"; //usuwanie danych przejzdow kierowcy
                    if(!(mysqli_query($conn, $sql))){
                        echo "<br>Nie udało się usunąć przejazdu.";
                    } 
                }
                echo "<br>Usuwanie powiodło się.";
            }
        }
    } else {
        echo " ";
    }
   