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
?>