<?php
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai Huruf: A";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
    echo "Nilai Huruf: B";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
    echo "Nilai Huruf: C";
} elseif ($nilaiNumerik < 70) {
    echo "Nilai Huruf: D";
}

echo "<br>";

$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}

echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer.";
echo "<br>";

$jumlahLahan = 10;
$jumlahPerlahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) {
    $jumlahBuah += ($jumlahPerlahan * $buahPerTanaman);
}

echo "Jumlah buah yang akan dipanen adalah: $jumlahBuah";
echo "<br>";

$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    $totalSkor += $skor;
}

echo "Total skor ujian adalah: $totalSkor";
echo "<br>";

$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai < 60) {
        echo "Nilai: $nilai (Tidak Lulus) <br>";
        continue;
    }
    echo "Nilai: $nilai (Lulus) <br>";
}

echo "<br>";

$nilai_siswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
sort($nilai_siswa);

$nilai_siswa = array_slice($nilai_siswa, 2, -2);

$total_nilai = array_sum($nilai_siswa);

echo "Total nilai: " . $total_nilai;
echo "<br>";

$hargaBeli = 120000;
$hargaSetelahDiskon = 0;

if ($hargaBeli > 100000) {
    $diskon = 0.2;
    $hargaSetelahDiskon = $hargaBeli * (1 - $diskon);
}

echo "Harga setelah diskon: " . $hargaSetelahDiskon;
echo "<br>";

$poin = 600;

$totalSkor = $poin;
$hadiahTambahan = ($poin > 500) ? 'YA' : 'TIDAK';

echo "Total skor pemain adalah: $totalSkor <br>";
echo "Apakah pemain mendapatkan hadiah tambahan? $hadiahTambahan <br>";
?>