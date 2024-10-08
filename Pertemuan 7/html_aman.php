<!DOCTYPE html>
<html>
    <head>
        <title>HTML Aman</title>
    </head>
    <body>
        <h2>HTML Aman</h2>
        <?php
        if (isset($_POST['input'])) {
            $input = $_POST['input'];
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
            echo "$input";
        } else {
            echo "Tidak ada input" . "<br>";
        }
        ?>
    </body>
</html>