<?php
$jumlahKursiTotal = 45;
$jumlahKursiDitempati = 28;

$jumlahKursiKosong = $jumlahKursiTotal - $jumlahKursiDitempati;

$persentaseKursiKosong = ($jumlahKursiKosong / $jumlahKursiTotal) * 100;

echo "Persentase kursi kosong: " . round($persentaseKursiKosong, 2) . "%";
?>