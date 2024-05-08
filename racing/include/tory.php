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
        $name = $_POST['tor'];
        if (empty($name)) {
            echo "Bład wyboru, skontaktuj się z administratorem. [kierowcy]";
        } else {
            $sql = "select * from tor where idt = ".$name.";";

            $sql_kier = "select kierowcy.nazwa as nazwa, przejazdy.czas as czas, przejazdy.data_przejazdow as data from kierowcy inner join tor inner join przejazdy where tor.idt = ".$name." and kierowcy.idk = przejazdy.idk and przejazdy.idt = tor.idt;";

            $res = mysqli_query($conn, $sql);
            $res_chceck = mysqli_num_rows($res);

            $res_kier = mysqli_query($conn, $sql_kier);
            $res_chceck_kier = mysqli_num_rows($res_kier);

            if($res_chceck > 0){
                echo "<br>Informacje o torze:";
                echo "<br><br><table><tr><th>Nazwa</th><th>Długość [km]</th><th>Ilość zakrętów</th></tr>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr><td>".$row['Nazwa']."</td><td>".$row['dlugosc']."</td><td>".$row['zakrety']."</td></tr>";
                }
                echo "</table>";
            }
            if($res_chceck_kier > 0){
            echo "<br>Przejazdy na torze:";
            echo "<br><br><table><tr><th>Kierowca</th><th>Czas</th><th>Data</th></tr>";
                while ($row_kier = mysqli_fetch_assoc($res_kier)) {
                    echo "<tr><td>".$row_kier['nazwa']."</td><td>".$row_kier['czas']."</td><td>".$row_kier['data']."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<br>Nikt jeszcze nie wykonał przejazdu na tym torze.";
            }
        }
    }
   