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
        $chosen = $_POST['chosen'];
        $staz = $_POST['staz'];
        if (empty($name) && empty($chosen) && empty($staz)) {
            echo "Bład wyboru, skontaktuj się z administratorem. [kierowcy_edit]";
        }
        elseif (!empty($staz) && !empty($chosen)) {
            $sql = "update kierowcy set nazwa='".$chosen."', Staz=".$staz." where idk = ".$name.";";
            if(!(mysqli_query($conn, $sql))){
                echo "<br>Zmiana nie powiodła się.";
            } else {
                echo "<br>Zmiana się powiodła.";
            }
        } else {
            $sql = "select * from kierowcy where idk = ".$name.";";
            $res = mysqli_query($conn, $sql);
            $res_chceck = mysqli_num_rows($res);
            if($res_chceck > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<form action=".$_SERVER['PHP_SELF']." method='POST'>
                    <label for='tor'><center>Uzupełnij dane:</center></label>";
                    echo "<br>Imie i nazwisko:<br><input type='text' name='chosen' value=".$row['nazwa']." required><br><br>";
                    echo "Staz (lata):<br><input type='number' name='staz' value=".$row['Staz']." required><br><br>";
                    echo "<input type='hidden' name='kierowcy' value=".$name.">";
                    echo "<input type='submit' value='Edytuj'></form>";
                }
            }
        }
    }
   