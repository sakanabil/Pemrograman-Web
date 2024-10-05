<!DOCTYPE html>
<html>
    <head>
        <title>Data Siswa</title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <style>
            body {
                font-family: Arial;
                background-color: #4169e1;
                margin: 0;
                padding: 100px;
            }

            h2 {
                text-align: center;
                color: white;
            }

            .rataRata {
                text-align: center;
                margin-bottom: 10px;
                margin-top: 25px;
                font-weight: bold;
            }
            
            #tampil {
                display: block;
                font-weight: bold;
                font-size: 15px;
                width: 560px;
                margin: 30px auto;
                padding: 5px;
                background-color: white;
                color: black;
                border-radius: 5px;
                cursor: pointer;
                box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
                border: none;
            }

            .datasiswa {
                display: none;
                background-color: white;
                border-radius: 5px;
                box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
                padding: 30px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                padding: 10px;
                text-align: left;
                border: 1px solid #ddd;
            }

            th {
                background-color: grey;
                color: white;
            }
        </style>
        <script>
            $(document).ready(function() {
                $("#tampil").click(function() {
                    $(".datasiswa").slideToggle("slow");
                });
            });
        </script>
    </head>
    <body>
        <h2>Data Siswa</h2>
        <button id="tampil">Tampilkan Data</button>
        <div class="datasiswa">
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dataSiswa = [
                        ["nama" => "Saka", "umur" => 19, "kelas" => "2G", "alamat" => "Malang"],
                        ["nama" => "Hamdan", "umur" => 20, "kelas" => "2G", "alamat" => "Malang"],
                        ["nama" => "Vincent", "umur" => 19, "kelas" => "2A", "alamat" => "Blitar"],
                        ["nama" => "Dimas", "umur" => 21, "kelas" => "2F", "alamat" => "Pasuruan"]
                    ];

                    foreach ($dataSiswa as $siswa) {
                        echo "<tr>
                                <td>{$siswa['nama']}</td>
                                <td>{$siswa['umur']}</td>
                                <td>{$siswa['kelas']}</td>
                                <td>{$siswa['alamat']}</td>
                            </tr>";
                    }

                    $rataUmur = array_sum(array_column($dataSiswa, 'umur')) / count($dataSiswa);
                    ?>
                </tbody>
            </table>
            <div class="rataRata">
                <?php
                echo "Rata-rata Umur Siswa: " . round($rataUmur, 2) . " tahun";
                ?>
            </div>
        </div>
    </body>
</html>
