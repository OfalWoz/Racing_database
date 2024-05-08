<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css.css">
        <title>Racing Center</title>
    </head>
    <html>
    <body><center>
    <h1>Racing Center Los Santos</h1>
        Home<br><br>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <button name="chose" value="select">Wyświetl dane</button><br>
            <button name="chose" value="edit">Edytuj dane</button><br>
            <button name="chose" value="add">Dodaj dane</button><br>
            <button name="chose" value="delete">Usun dane</button>
        </form>

        <?php
            include_once "include/dbh.inc.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['chose'];
                if (empty($name)) {
                   echo "Bład wyboru, skontaktuj się z administratorem. [index]";
                } 
                elseif($name == "select") {
                    include "select.php";
                }
                elseif($name == "edit") {
                    include "edit.php";
                }
                elseif($name == "delete") {
                    include "delete.php";
                }
                elseif($name == "add") {
                    include "add.php";
                } else {
                    echo "Nie powinno to ci sie to wyswietlic O.o";
                }
            }
        ?>

        </center></body>
</html>