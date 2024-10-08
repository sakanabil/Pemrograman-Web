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
            echo "Tidak ada input" ;
        }

        if (isset($_POST['email'])) {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
            echo "Email valid";
        } else {
            echo "Email tidak valid" . "<br>";
        }
        ?>
    </body>
</html>