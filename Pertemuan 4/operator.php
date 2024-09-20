<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;
$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;
$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;
$hasilPenugasanTambah = $a += $b;
$hasilPenugasanKurang = $a -= $b;
$hasilPenugasanKali = $a *= $b;
$hasilPenugasanBagi = $a /= $b;
$hasilPenugasanSisaBagi = $a %= $b;

echo "Hasil tambah: {$hasilTambah} <br>";
echo "Hasil kurang: {$hasilKurang} <br>";
echo "Hasil kali: {$hasilKali} <br>";
echo "Hasil bagi: {$hasilBagi} <br>";
echo "Hasil sisa bagi: {$sisaBagi} <br>";
echo "Hasil pangkat: {$pangkat} <br>";
echo "Apakah $a sama dengan $b? : " . ($hasilSama ? 'Ya' : 'Tidak') . "<br>";
echo "Apakah $a tidak sama dengan $b? : " . ($hasilTidakSama ? 'Ya' : 'Tidak') . "<br>";
echo "Apakah $a lebih kecil dari $b? : " . ($hasilLebihKecil ? 'Ya' : 'Tidak') . "<br>";
echo "Apakah $a lebih besar dari $b? : " . ($hasilLebihBesar ? 'Ya' : 'Tidak') . "<br>";
echo "Apakah $a lebih kecil atau sama dengan $b? : " . ($hasilLebihKecilSama ? 'Ya' : 'Tidak') . "<br>";
echo "Apakah $a lebih besar atau sama dengan $b? : " . ($hasilLebihBesarSama ? 'Ya' : 'Tidak') . "<br>";
echo "Hasil AND: " . ($a && $b) . "<br>";
echo "Hasil OR: " . ($a || $b) . "<br>";
echo "Hasil NOT A: " . (!$a) . "<br>";
echo "Hasil NOT B: " . (!$b) . "<br>";
echo "Hasil penugasan tambah: {$hasilPenugasanTambah} <br>";
echo "Hasil penugasan kurang: {$hasilPenugasanKurang} <br>";
echo "Hasil penugasan kali: {$hasilPenugasanKali} <br>";
echo "Hasil penugasan bagi: {$hasilPenugasanBagi} <br>";
echo "Hasil penugasan sisa bagi: {$hasilPenugasanSisaBagi} <br>";
?>