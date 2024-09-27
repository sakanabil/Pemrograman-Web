<?php

function perkenalan($nama, $salam){
    echo $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

echo "<hr>";

$saya = "Saka";
$ucapanSalam = "Selamat pagi";

perkenalan($saya, $ucapanSalam);

?>