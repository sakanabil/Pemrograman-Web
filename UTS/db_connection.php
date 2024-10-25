<?php
// Koneksi ke SQL Server
$serverName = "LAPTOP-QJG2NMBJ\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "bem_voting",

    "Driver" => "{ODBC Driver 17 for SQL Server}",
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
