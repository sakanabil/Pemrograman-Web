<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title> 
        <style>
            table {
                border-collapse: collapse;
                border-spacing: 0;
                width: 100%;
                border: 2px solid #ddd;
            }

            th, td {
                text-align: left;
                padding: 18px;
            }

            tr:nth-child(even) {
                background-color: #f1f1f1;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th> Nama </th>
                <th> Domisili </th>
                <th> Jenis Kelamin </th>
            </tr>
        <?php
        $Dosen = array(
            array("Elok Nur Hamdana", "Malang", "Perempuan"),
        );
        echo "<tr>";
        foreach ($Dosen as $dosen) {
            echo "<td>". $dosen[0] ."</td>";
            echo "<td>". $dosen[1] ."</td>";
            echo "<td>". $dosen[2] ."</td>";
        }
        echo "</tr>";
        ?> 
        </table>
    </body>
</html>