<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css.css">
        <h1>Racing Center Los Santos</h1>
    </head>
    <body>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $name = $_POST['select'];
            if (empty($name)) {
                echo "Name is empty";
            } else {
                echo $name;
            }
            }
        ?>
    </body>
</html>