<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css.css">
        <title>Racing Center</title>
    </head>
    <body><center>
    <h1>Racing Center Los Santos</h1>
    <a href="../"><input type="button" value="Home"></a>
    <br>Dodawanie<br>
    <?php
        include_once "dbh.inc.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['tablice'];
            if (empty($name)) {
                echo "Bład wyboru, skontaktuj się z administratorem. [select_tabice]";
            }
            elseif($name == "kierowcy") {
                echo "<br><form action='kierowca_add.php' method='POST'>
                <label for='tor'><center>Uzupełnij dane:</center></label>
                <br>Imie i nazwisko:<br><input type='text' name='nazwa' value='ImieNazwisko'><br><br>
                Staz (lata):<br><input type='number' name='staz' value='0'><br><br>
                <input type='submit' value='Dodaj'></form>";
            }
            elseif($name == "przejazdy") {
                $sql_kier = "select * from kierowcy;";
                $res_kier = mysqli_query($conn, $sql_kier);
                $res_chceck_kier = mysqli_num_rows($res_kier);

                $sql_tor = "select * from tor;";
                $res_tor = mysqli_query($conn, $sql_tor);
                $res_chceck_tor = mysqli_num_rows($res_tor);
                
                echo "<form action='przejazd_add.php' method='POST'>
                <label for='przejazd'><center><br>Uzupełnij dane:</center></label>
                <br><select name='idk' id='kierowcy'>";    
                if($res_chceck_kier > 0) { 
                    while ($row_kier = mysqli_fetch_assoc($res_kier)) {
                        echo "<option name='idk' value=".$row_kier['idk'].">".$row_kier['nazwa']."</option>";
                    }
                    echo "</select><br>Tor:<br><select name='tor' id='tor'>";
                    while ($row_tor = mysqli_fetch_assoc($res_tor)) {
                        echo "<option name='tor' type = 'number' step='1' value=".$row_tor['idt'].">".$row_tor['Nazwa']."</option>";
                    }
                    echo "</select>
                    <br>Czas okrązenia:<br><input type = 'time' name = 'czas' step='1' value ='00:00:00'><br>
                    Ilość przejazdów:<br><input type = 'number' min='1' name = 'ilosc' value = '1'><br>
                    Data przejazdu:<br><input type = 'date' name = 'data' value = '2022-01-01'><br><br>
                    <input type='submit' value='Dodaj'></form>";
                }
            }
            elseif($name == "tory") {
                $sql = "select * from tor;";
                $res = mysqli_query($conn, $sql);
                $res_chceck = mysqli_num_rows($res);
                if($res_chceck > 0) {
                    echo "<form action='tor_add.php' method='POST'>
                    <label for='tor'><center>Uzupełnij dane:</center></label>";
                    echo "<br>Nazwa:<br><input type='text' name='chosen' value=''required><br><br>";
                    echo "Długość [km]:<br><input type='number' step=0.01 name='dlugosc' value=0.00 required><br><br>";
                    echo "Ilość zakrętów:<br><input type='number' step=1 name='zakrety' value=0 required><br><br>";
                    echo "<input type='submit' value='Dodaj'></form>";
                }
            }
            elseif($name == "zawody") {
                $sql = "select * from Zawody;";
                $res = mysqli_query($conn, $sql);
                $res_chceck = mysqli_num_rows($res);
                if($res_chceck > 0) {
                    echo "<form action='zawody_add.php' method='POST'>
                    <label for='tor'><center>Uzupełnij dane:</center></label>
                    <br>Nazwa:<br><input type='text' name='zawody' value='' required><br><br>
                    Data:<br><input type='date' name='data' value='2022-01-01' required><br><br>
                    Nagroda:<br><input type='textarea' name='nagroda' value='' ><br><br>
                    <input type='submit' value='Dodaj'></form>";
                }
            }
            elseif($name == "torzawody") {
                $sql_zaw = "select * from Zawody;";
                $res_zaw = mysqli_query($conn, $sql_zaw);
                $res_chceck_zaw = mysqli_num_rows($res_zaw);

                $sql_tor = "select * from tor;";
                $res_tor = mysqli_query($conn, $sql_tor);
                $res_chceck_tor = mysqli_num_rows($res_tor);

                if($res_chceck_zaw > 0) {
                    echo "<form action='tor_zawody_add.php' method='POST'>
                    <label for='tor'><br><center>Uzupełnij dane:</center></label>
                    <br>Zawody:<br><select name='zawody' id='zawody' required>";
                    while ($row_zaw = mysqli_fetch_assoc($res_zaw)) {
                        echo "<option name='zawody' type = 'number' value=".$row_zaw['idz'].">".$row_zaw['nazwa']."</option>";
                    }
                    echo "</select><br><br>Tor:<br><select name='tor' id='tor' required>";
                    while ($row_tor = mysqli_fetch_assoc($res_tor)) {
                        echo "<option name='tor' type = 'number' value=".$row_tor['idt'].">".$row_tor['Nazwa']."</option>";
                    }
                    echo "</select><br><br>
                    Ilość wyścigów na torze:<br><input type='number' name='ilosc' step=1 min=1 value='1' required><br><br>
                    <input type='submit' value='Dodaj'></form>";
                }
            }
        }
    ?>
    </center>