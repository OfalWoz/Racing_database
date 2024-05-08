
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css.css">
        <title>Racing Center</title>
    </head>
    <body><center>
    <h1>Racing Center Los Santos</h1>
    <a href="../"><input type="button" value="Home"></a>
    <br>Usuwanie<br>
    <?php
        include_once "dbh.inc.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['tablice'];
            if (empty($name)) {
                echo "Bład wyboru, skontaktuj się z administratorem. [delete_tablice]";
            }
            elseif($name == "kierowcy") {
                $sql = "select * from kierowcy;";
                $res = mysqli_query($conn, $sql);
                $res_chceck = mysqli_num_rows($res);
                if($res_chceck > 0){
                    echo "<br><form action='kierowcy_delete.php' method='POST'>
                    <label for='kierowcy'><center>Wybierz kierowce:</center></label>
                    <select name='kierowcy' id='kierowcy' required>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<option value=".$row['idk'].">".$row['nazwa']."</option>";
                    }
                    echo "</select><br><input type='submit' value='Usuń'></form>";
                }
            }
            elseif($name == "tory") {
                echo "Tory:<br>";
                $sql = "select * from tor;";
                $res = mysqli_query($conn, $sql);
                $res_chceck = mysqli_num_rows($res);
                if($res_chceck > 0) {
                    echo "<br><form action='tor_delete.php' method='POST'>
                    <label for='tor'><center>Wybierz tor:</center></label>
                    <select name='tor' id='tor' required>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<option value=".$row['idt'].">".$row['Nazwa']."</option>";
                    }
                    echo "</select><br><input type='submit' value='Usuń'></form>";
                }
            }
            elseif($name == "zawody") {
                echo "Zawody:<br>";
                $sql = "select * from zawody;";
                $res = mysqli_query($conn, $sql);
                $res_chceck = mysqli_num_rows($res);
                if($res_chceck > 0) {
                    echo "<br><form action='zawody_delete.php' method='POST'>
                    <label for='zawody'><center>Wybierz zawody:</center></label>
                    <select name='zawody' id='zawody' required>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<option value=".$row['idz'].">".$row['nazwa']."</option>";
                    }
                    echo "</select><br><input type='submit' value='Usuń'></form>";
                }
            }
            elseif($name == "torzaw") {
                echo "Zawody:<br>";
                $sql = "select * from zawody;";
                $res = mysqli_query($conn, $sql);
                $res_chceck = mysqli_num_rows($res);
                if($res_chceck > 0) {
                    echo "<br><form action='tor_zawody_delete.php' method='POST'>
                    <label for='zawody'><center>Wybierz zawody:</center></label>
                    <select name='zawody' id='zawody' required>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<option value=".$row['idz'].">".$row['nazwa']."</option>";
                    }
                    echo "</select><br><input type='submit' value='Wybierz'></form>";
                }
            }
        }
    ?>
    </center>