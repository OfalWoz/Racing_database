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
        $name = $_POST['zawody'];
        if (empty($name)) {
            echo "Bład wyboru, skontaktuj się z administratorem. [zawody]";
        } else {
            $sql = "select * from Zawody where idz = ".$name.";";

            $res = mysqli_query($conn, $sql);
            $res_chceck = mysqli_num_rows($res);

            $sql_tor = "select * from tor inner join Zawody inner join zawody_szczegoly where Zawody.idz = ".$name." and Zawody.idz = zawody_szczegoly.idz and zawody_szczegoly.idt = tor.idt;";

            $res_tor = mysqli_query($conn, $sql_tor);
            $res_chceck_tor = mysqli_num_rows($res_tor);

            $sql_kier = "select kierowcy.nazwa as nazwa from przejazdy inner join kierowcy inner JOIN Zawody inner join zawody_szczegoly inner join tor WHERE Zawody.idz = ".$name." and zawody_szczegoly.idz = Zawody.idz and zawody_szczegoly.idt = tor.idt and przejazdy.idt = tor.idt and Zawody.data = przejazdy.data_przejazdow and kierowcy.idk = przejazdy.idk;";

            $res_kier = mysqli_query($conn, $sql_kier);
            $res_chceck_kier = mysqli_num_rows($res_kier);

            if($res_chceck > 0){
                echo "<br>Informacje o zwodach:";
                echo "<br><br><table><tr><th>Nazwa</th><th>Data</th><th>Nagroda</th></tr>";
                while ($row = mysqli_fetch_assoc($res)){
                    echo "<tr><td>".$row['nazwa']."</td><td>".$row['data']."</td><td>".$row['nagroda']."</td></tr>";
                }
                echo "</table>";
            }

            if($res_chceck_tor > 0){
                echo "<br>Na jakich torach:";
                echo "<br><br><table><tr><th>Tor</th><th>Długość</th><th>Ilość wyścigów</th></tr>";
                while ($row_tor = mysqli_fetch_assoc($res_tor)){
                    echo "<tr><td>".$row_tor['Nazwa']."</td><td>".$row_tor['dlugosc']."</td><td>".$row_tor['ilosc_wyscigow']."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<br>Zawody nie mają przypisanego toru.";
            }

            if($res_chceck_kier > 0){
                echo "<br>Uczestnicy:";
                echo "<br><br><table><tr><th>Imię i nazwisko</th></tr>";
                while ($row_kier = mysqli_fetch_assoc($res_kier)){
                    echo "<tr><td>".$row_kier['nazwa']."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<br>Brak przypisanych uczetników.";
            }
        }
    }
   