<?php
session_start();
include 'db_connection.php';

// Pengecekan session admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: index.php');
    exit;
}

// Ambil data suara dari database dengan informasi pemilih
$query = "SELECT 
    c.Name as CandidateName, 
    c.Votes,
    COUNT(vr.VoteID) as ActualVotes,
    STRING_AGG(CONCAT(s.NIM, ' - ', s.Name), ', ') as Voters
FROM Candidates c
LEFT JOIN VotingRecords vr ON c.CandidateID = vr.CandidateID
LEFT JOIN Students s ON vr.StudentID = s.StudentID
GROUP BY c.CandidateID, c.Name, c.Votes";

$stmt = sqlsrv_query($conn, $query);
$data = [];
$voterDetails = [];

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
    $voterDetails[$row['CandidateName']] = $row['Voters'];
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Voting Capres dan Cawapres BEM</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <a href="logout.php" class="logout-button">Logout</a>
        <h1>Hasil Voting Capres dan Cawapres BEM</h1>
        <canvas id="voteChart" width="400" height="200"></canvas>

        <div class="voter-details">
            <h2>Detail Pemilih:</h2>
            <?php foreach ($data as $row): ?>
                <h3><?php echo $row['CandidateName']; ?> (<?php echo $row['ActualVotes']; ?> suara)</h3>
                <p><?php echo $row['Voters'] ? $row['Voters'] : 'Belum ada pemilih'; ?></p>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('voteChart').getContext('2d');
        var voteChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php foreach ($data as $row) {
                        echo "'" . $row['CandidateName'] . "',";
                    } ?>
                ],
                datasets: [{
                    label: 'Jumlah Suara',
                    data: [
                        <?php foreach ($data as $row) {
                            echo $row['ActualVotes'] . ',';
                        } ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>