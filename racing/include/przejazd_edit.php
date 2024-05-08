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
        // collect value of input field
        $name = $_POST['przejazdy'];
        $chosen = $_POST['chosen'];
        $tor = $_POST['tor'];
        $czas = $_POST['czas'];
        $ilosc = $_POST['ilosc'];
        $data = $_POST['data'];
        if (empty($name) && empty($chosen) && empty($tor) && empty($czas) && empty($ilosc) && empty($data)) {
            echo "Bład wyboru, skontaktuj się z administratorem. [przjezd_edit]";
        } elseif (!empty($czas)) { //update danych w bazie
            //echo $name." ".$tor." ".$chosen." ".$tor." ".$czas." ".$ilosc." ".$data;
            $sql_data = "update przejazdy set data_przejazdow='".$data."', idt=".$tor.", czas='".$czas."', ilosc=".$ilosc.", idk = ".$chosen." where idp=".$name.";";
            //$sql = "update przejazdy set przejazdy.idt=".$tor.", przejazdy.idk=".$chosen.", przejazdy.data_przejazdow=".$data.", przejazdy.ilosc=".$ilosc.", przejazdy.czas=".$czas." where przejazdy.idp=".$name.";";
            if(!(mysqli_query($conn, $sql_data))) {
                echo "<br>Zmiana nie powiodła się.";
            } else {
                echo "<br>Zmiana się powiodła.";
            }
        } elseif (empty($czas)) { //formularz 
            $sql = "select * from przejazdy where idp = ".$name.";";
            $res = mysqli_query($conn, $sql);
            $res_chceck = mysqli_num_rows($res);
            //tor
            $sql_tor = "select * from tor;";
            $res_tor = mysqli_query($conn, $sql_tor);
            $res_chceck_tor = mysqli_num_rows($res_tor);

            if($res_chceck > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    //kierowcy
                    $sql_kier = "select * from kierowcy;";
                    $res_kier = mysqli_query($conn, $sql_kier);
                    $res_chceck_kier = mysqli_num_rows($res_kier);
                    
                    echo "<form action=".$_SERVER['PHP_SELF']." method='POST'>
                    <label for='przejazd'><center><br>Uzupełnij dane:</center></label>
                    <br>Kierowca:<br><br><select name='chosen' id='kierowcy'>";                //update nie chce dzialac przy przyjmowaniu danych o kierowcy
                    if($res_chceck_kier > 0) { 
                        while ($row_kier = mysqli_fetch_assoc($res_kier)) {
                            echo "<option name='chosen' value=".$row_kier['idk'].">".$row_kier['nazwa']."</option>";
                        }
                        echo "</select>";
                        echo "<br>Tor:<br><select name='tor' id='tor'>";
                        while ($row_tor = mysqli_fetch_assoc($res_tor)) {
                            echo "<option name='tor' type = 'number' step='1' value=".$row_tor['idt'].">".$row_tor['Nazwa']."</option>";
                        }
                        echo "</select>
                        <br>Czas okrązenia:<br><input type = 'time' name = 'czas' step='1' value = ".$row['czas']." required><br>
                        Ilość przejazdów:<br><input type = 'number' min='1' name = 'ilosc' value = ".$row['ilosc']." required><br>
                        Data przejazdu:<br><input type = 'date' name = 'data' value = ".$row['data_przejazdow']." required><br><br>
                        <input type='hidden' name='przejazdy' value=".$name.">
                        <input type='submit' value='Edytuj'></form>";
                    }
                }
            }
        } else {
            echo "no i chuj nie dziala";
        }
    }
    
   