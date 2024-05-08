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
        $name = $_POST['kierowcy'];
        if (empty($name)) {
            echo "Bład wyboru, skontaktuj się z administratorem. [kierowcy]";
        } else {
            $sql1 = "select * from kierowcy where kierowcy.idk = ".$name.";";
            $sql = "select przejazdy.czas, tor.Nazwa, przejazdy.data_przejazdow from kierowcy inner join tor inner join przejazdy where kierowcy.idk = ".$name." and kierowcy.idk = przejazdy.idk and przejazdy.idt = tor.idt;";

            $sql2 = "select Zawody.data, Zawody.nazwa from przejazdy inner JOIN Zawody inner join zawody_szczegoly inner join tor WHERE przejazdy.idk = ".$name." and zawody_szczegoly.idz = Zawody.idz and zawody_szczegoly.idt = tor.idt and przejazdy.idt = tor.idt and Zawody.data = przejazdy.data_przejazdow;";
            
            $res1 = mysqli_query($conn, $sql1);
            $res_chceck1 = mysqli_num_rows($res1);

            $res2 = mysqli_query($conn, $sql2);
            $res_chceck2 = mysqli_num_rows($res2);

            if($res_chceck1 > 0) {
                $row1 = mysqli_fetch_assoc($res1);
                echo "<br><br><h3>".$row1['nazwa']."</h3>";
                echo "Staz: ".$row1['Staz']." lat/a<br><br>";
                $res = mysqli_query($conn, $sql);
                $res_chceck = mysqli_num_rows($res);
                if($res_chceck > 0) {
                    echo "<table><tr><th>Czas</th><th>Tor</th><th>Data</th><th>Zawody</th></tr>";
                    if($res_chceck2 > 0) {
                        $row2 = mysqli_fetch_assoc($res2);
                        while($row = mysqli_fetch_assoc($res)) {
                            echo "<tr><td>".$row['czas']."</td><td>".$row['Nazwa']."</td><td>".$row['data_przejazdow']."</td><td>".$row2['nazwa']."</td></tr>";
                        }
                    } else {
                        while($row = mysqli_fetch_assoc($res)) {
                            echo "<tr><td>".$row['czas']."</td><td>".$row['Nazwa']."</td><td>".$row['data_przejazdow']."</td><td>Nie</td></tr>";
                        }
                    }
                    echo "</table>";
                } else {
                    echo "Nie wykonał jeszcze przejadu.";
                }
            }
        }
    }