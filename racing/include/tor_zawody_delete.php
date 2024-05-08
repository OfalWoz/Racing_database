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
        $tor = $_POST['tor'];
        if (empty($nazwa) && empty($tor)) {
            echo "<br>Bład wyboru, skontaktuj się z administratorem. [tor_zawody_delete]";
        } elseif(!(empty($tor))) {
            $sql_zaw = "select * from zawody_szczegoly where idt= ".$tor." and idz =".$nazwa.";";

            $res_zaw = mysqli_query($conn, $sql_zaw);
            $res_chceck_zaw = mysqli_num_rows($res_zaw);
            if($res_chceck_zaw > 0) {
                $sql_del = "delete from zawody_szczegoly where idz = ".$nazwa." and idt= ".$tor.";"; //usuwanie danych zawodów ze szczegolow
                if(!(mysqli_query($conn, $sql_del))) {
                    echo "<br>Nie udało się usunąć zawodow ze szczegołow.";
                } else {
                    echo "<br>Usuwanie powiodło się.";
                }
            } else {
                echo "Zawody juz nie posiadają tego toru.";
            }
        } else {
            $sql = "select tor.Nazwa as Nazwa, tor.idt as idt from zawody_szczegoly inner join tor where zawody_szczegoly.idz = ".$nazwa." and zawody_szczegoly.idt = tor.idt;";
            $res = mysqli_query($conn, $sql);
            $res_chceck = mysqli_num_rows($res);
            if($res_chceck > 0) {
                echo "<br><form action=".$_SERVER['PHP_SELF']." method='POST'>
                <label for='tor'><center>Wybierz tor:</center></label>
                <select name='tor' id='tor'>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<option name = 'tor' value=".$row['idt'].">".$row['Nazwa']."</option>";
                }
                echo "<input type='hidden' name='zawody' value=".$nazwa." required>";
                echo "</select><br><input type='submit' value='Usuń'></form>";
            } else {
                echo "Zawody nie posiadają zadnego toru.";
            }
        }
    } else {
        echo " ";
    }
   