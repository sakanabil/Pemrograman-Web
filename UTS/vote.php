<?php
session_start();
include 'db_connection.php';

// Cek apakah user sudah login sebagai mahasiswa
if (!isset($_SESSION['student_id'])) {
    header('Location: index.php');
    exit;
}

// Ambil data calon ketua BEM dari tabel Candidates di database
$query = "SELECT * FROM Candidates";
$stmt = sqlsrv_query($conn, $query);
$candidates = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $candidates[] = $row;
}

// Cek apakah mahasiswa sudah melakukan voting
$checkVoteQuery = "SELECT VoteID FROM VotingRecords WHERE StudentID = ?";
$params = array($_SESSION['student_id']);
$checkStmt = sqlsrv_query($conn, $checkVoteQuery, $params);

if ($checkStmt && sqlsrv_fetch_array($checkStmt)) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Presiden BEM</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Pemilihan Capres dan Cawapres BEM</h1>
        <p class="welcome-text">Selamat datang, <?php echo htmlspecialchars($_SESSION['student_name']); ?></p>
        <div id="message"></div>
        <div class="candidates">
            <?php foreach ($candidates as $candidate): ?>
            <div class="candidate">
                <img src="images/<?php echo $candidate['Photo']; ?>" alt="Foto <?php echo $candidate['Name']; ?>">
                <h2><?php echo $candidate['Name']; ?></h2>
                <p><strong>Visi:</strong> <?php echo $candidate['Vision']; ?></p>
                <p><strong>Misi:</strong> <?php echo $candidate['Mission']; ?></p>
                <button class="vote-button" data-id="<?php echo $candidate['CandidateID']; ?>">Pilih</button>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".vote-button").on("click", function() {
                var candidateID = $(this).data("id");
                var button = $(this);

                $.ajax({
                    url: "voteProcess.php",
                    method: "POST",
                    data: { candidate_id: candidateID },
                    success: function(response) {
                        $("#message").html(response);
                        if (response.includes('Terima kasih')) {
                            // Disable semua tombol voting setelah berhasil
                            $(".vote-button").prop('disabled', true);
                            // Redirect ke halaman sukses setelah 2 detik
                            setTimeout(function() {
                                window.location.href = 'index.php';
                            }, 2000);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>