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

echo "<hr>";

function hitungUmur($thn_lahir, $thn_sekarang) {
    $umur = $thn_sekarang - $thn_lahir;
    return $umur;
}

echo "Umur saya adalah " . hitungUmur(2005, 2024) ." tahun";
?>
