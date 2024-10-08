<!DOCTYPE html>
<html>
    <head>
        <title>Hasil Form</title>
    </head>
    <body>
        <h2>Hasil Form</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST["nama"];
            $email = $_POST["email"];

            echo "Nama: " . $nama . "<br>";
            echo "Email: " . $email;
        }
        ?>
    </body>
</html>