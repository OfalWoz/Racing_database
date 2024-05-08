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
        $chosen = $_POST['chosen'];
        $dlugosc = $_POST['dlugosc'];
        $zakrety = $_POST['zakrety'];
        if (empty($name) && empty($chosen) && empty($dlugosc) && empty($zakrety)) {
            echo "Bład wyboru, skontaktuj się z administratorem. [kierowcy_edit]";
        }
        elseif (!empty($dlugosc) && !empty($chosen)) {
            $sql = "update tor set Nazwa='".$chosen."', dlugosc=".$dlugosc.", zakrety=".$zakrety." where idt = ".$name.";";
            if(!(mysqli_query($conn, $sql))){
                echo "<br>Zmiana nie powiodła się.";
            } else {
                echo "<br>Zmiana się powiodła.";
            }
        } else {
            $sql = "select * from tor where idt = ".$name.";";
            $res = mysqli_query($conn, $sql);
            $res_chceck = mysqli_num_rows($res);
            if($res_chceck > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<form action=".$_SERVER['PHP_SELF']." method='POST'>
                    <label for='tor'><center>Uzupełnij dane:</center></label>";
                    echo "<br>Nazwa:<br><input type='text' name='chosen' value=".$row['Nazwa']." required><br><br>";
                    echo "Długość [km]:<br><input type='number' step=0.01 name='dlugosc' value=".$row['dlugosc']." required><br><br>";
                    echo "Ilość zakrętów:<br><input type='number' step=1 name='zakrety' value=".$row['zakrety']." required><br><br>";
                    echo "<input type='hidden' name='tor' value=".$name.">";
                    echo "<input type='submit' value='Edytuj'></form>";
                }
            }
        }
    }
   