<?php
session_start();
include 'db_connection.php';

// Validasi session
if (!isset($_SESSION['student_id'])) {
    echo "<div class='error'>Silakan login terlebih dahulu.</div>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $candidateID = $_POST['candidate_id'];
    $studentID = $_SESSION['student_id'];

    // Cek apakah mahasiswa sudah melakukan voting
    $checkQuery = "SELECT VoteID FROM VotingRecords WHERE StudentID = ?";
    $params = array($studentID);
    $checkStmt = sqlsrv_query($conn, $checkQuery, $params);

    if ($checkStmt && sqlsrv_fetch_array($checkStmt)) {
        echo "<div class='error'>Anda sudah melakukan voting.</div>";
        exit;
    }

    // Mulai transaction dengan SQL Server
    if (sqlsrv_begin_transaction($conn) === false) {
        echo "<div class='error'>Gagal memulai transaksi.</div>";
        exit;
    }

    try {
        // Record vote ke VotingRecords
        $recordVoteQuery = "INSERT INTO VotingRecords (StudentID, CandidateID) VALUES (?, ?)";
        $params = array($studentID, $candidateID);
        $stmt1 = sqlsrv_query($conn, $recordVoteQuery, $params);

        // Update jumlah suara di tabel Candidates
        $updateVotesQuery = "UPDATE Candidates SET Votes = Votes + 1 WHERE CandidateID = ?";
        $params = array($candidateID);
        $stmt2 = sqlsrv_query($conn, $updateVotesQuery, $params);

        if ($stmt1 && $stmt2) {
            sqlsrv_commit($conn);
            session_destroy(); // Destroy session setelah voting berhasil
            echo "<div class='success'>Terima kasih sudah memilih!</div>";
        } else {
            throw new Exception("Error processing vote");
        }
    } catch (Exception $e) {
        sqlsrv_rollback($conn);
        echo "<div class='error'>Gagal melakukan voting. Silakan coba lagi.</div>";
    }
}
?>