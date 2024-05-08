<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css.css">
        <title>Racing Center</title>
    </head>
    <body><center>
    <h1>Racing Center Los Santos</h1>
    <a href="../"><input type="button" value="Home"></a>
    <br>Edycja<br>
    <?php
        include_once "dbh.inc.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $name = $_POST['tablice'];
            if (empty($name)) {
                echo "Bład wyboru, skontaktuj się z administratorem. [select_tabice]";
            }
            elseif($name == "kierowcy") {
                $sql = "select * from kierowcy;";
                $res = mysqli_query($conn, $sql);
                $res_chceck = mysqli_num_rows($res);
                if($res_chceck > 0){
                echo "<br><form action='kierowcy_edit.php' method='POST'>
                <label for='kierowcy'><center>Wybierz kierowce:</center></label>
                <select name='kierowcy' id='kierowcy'>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<option value=".$row['idk'].">".$row['nazwa']."</option>";
                }
                echo "</select><br><input type='submit' value='Wybierz'></form>";
                }
            }
            elseif($name == "przejazdy") {
                $sql = "select * from przejazdy;";
                $res = mysqli_query($conn, $sql);
                $res_chceck = mysqli_num_rows($res);
                if($res_chceck > 0) {
                echo "<br><form action='przejazd_edit.php' method='POST'>
                <label for='przejazdy'><center>Wybierz przejazd:</center></label>
                <select name='przejazdy' id='przejazdy'>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<option value=".$row['idp'].">".$row['idp']."</option>";
                }
                echo "</select>
                <br>
                <input type='submit' value='Wybierz'>
                </form>";
                }
            }
            elseif($name == "tory") {
                $sql = "select * from tor;";
                $res = mysqli_query($conn, $sql);
                $res_chceck = mysqli_num_rows($res);
                if($res_chceck > 0) {
                    echo "<br><form action='tory_edit.php' method='POST'>
                    <label for='tor'><center>Wybierz tor:</center></label>
                    <select name='tor' id='tor'>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<option value=".$row['idt'].">".$row['Nazwa']."</option>";
                    }
                    echo "</select>
                    <br>
                    <input type='submit' value='Wybierz'>
                    </form>";
                }
            }
            elseif($name == "zawody") {
                $sql = "select * from zawody;";
                $res = mysqli_query($conn, $sql);
                $res_chceck = mysqli_num_rows($res);
                if($res_chceck > 0) {
                    echo "<br><form action='zawody_edit.php' method='POST'>
                    <label for='zawody'><center>Wybierz zawody:</center></label>
                    <select name='zawody' id='tor'>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<option value=".$row['idz'].">".$row['nazwa']."</option>";
                    }
                    echo "</select>
                    <br>
                    <input type='submit' value='Wybierz'>
                    </form>";
                }
            }
        }
    ?>
        </center>