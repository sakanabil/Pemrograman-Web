<?php

function perkenalan($nama, $salam="Asalamualaikum") {
    echo $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

perkenalan("Saka", "Hallo");

echo "<hr>";

$saya = "Saka";
$ucapanSalam = "Selamat pagi";

perkenalan($saya, $ucapanSalam);

?>