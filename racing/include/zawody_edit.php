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
        $chosen = $_POST['chosen'];
        $data = $_POST['data'];
        $nagroda = $_POST['nagroda'];
        if (empty($name) && empty($chosen) && empty($data) && empty($nagroda)) {
            echo "Bład wyboru, skontaktuj się z administratorem. [kierowcy_edit]";
        }
        elseif (!empty($data) && !empty($chosen)) {
            $sql = "update Zawody set nazwa='".$chosen."', data='".$data."', nagroda='".$nagroda."' where idz = ".$name.";";
            if(!(mysqli_query($conn, $sql))){
                echo "<br>Zmiana nie powiodła się.";
            } else {
                echo "<br>Zmiana się powiodła.";
            }
        } else {
            $sql = "select * from Zawody where idz = ".$name.";";
            $res = mysqli_query($conn, $sql);
            $res_chceck = mysqli_num_rows($res);
            if($res_chceck > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<form action=".$_SERVER['PHP_SELF']." method='POST'>
                    <label for='tor'><center>Uzupełnij dane:</center></label>
                    <br>Nazwa:<br><input type='text' name='chosen' value=".$row['nazwa']." required><br><br>
                    Data:<br><input type='date' name='data' value=".$row['data']." required><br><br>
                    Nagroda:<br><input type='textarea' name='nagroda' value=".$row['nagroda']."><br><br>
                    <input type='hidden' name='zawody' value=".$name.">
                    <input type='submit' value='Edytuj'></form>";
                }
            }
        }
    }
   