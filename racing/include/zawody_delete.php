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
        $nazwa = $_POST['zawody'];
        if (empty($nazwa)) {
            echo "<br>Bład wyboru, skontaktuj się z administratorem. [zawody_delete]";
        } else {
            $sql = "delete from zawody where idz = ".$nazwa.";";
            $sql_zaw = "select * from zawody_szczegoly where idz= ".$nazwa.";";

            $res_zaw = mysqli_query($conn, $sql_zaw);
            $res_chceck_zaw = mysqli_num_rows($res_zaw);
            
            if(!(mysqli_query($conn, $sql))){
                echo "<br>Usuwanie nie powiodło się.";
            } else {
                if($res_chceck_zaw > 0){
                    $sql = "delete from zawody_szczegoly where idz = ".$nazwa.";"; //usuwanie danych zawodów ze szczegolow
                    if(!(mysqli_query($conn, $sql))){
                        echo "<br>Nie udało się usunąć zawodow ze szczegołow.";
                    } 
                }
                echo "<br>Usuwanie powiodło się.";
            }
        }
    } else {
        echo " ";
    }
   