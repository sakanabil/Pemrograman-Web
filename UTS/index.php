<?php
session_start();
include 'db_connection.php';

if (isset($_POST['login'])) {
    $userType = $_POST['userType'];
    
    if ($userType === 'admin') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if ($username === 'admin' && $password === 'admin123') {
            $_SESSION['admin'] = true;
            header('Location: result.php');
            exit;
        } else {
            $error = "Username atau password admin salah!";
        }
    } else if ($userType === 'student') {
        $nim = $_POST['nim'];
        $name = $_POST['name'];
        
        // Cek apakah mahasiswa sudah login menggunakan NIM sebelumnya
        $checkVoteQuery = "SELECT vr.VoteID 
                          FROM VotingRecords vr 
                          JOIN Students s ON vr.StudentID = s.StudentID 
                          WHERE s.NIM = ?";
        $params = array($nim);
        $checkStmt = sqlsrv_query($conn, $checkVoteQuery, $params);
        
        if ($checkStmt && sqlsrv_fetch_array($checkStmt)) {
            $error = "NIM ini sudah digunakan untuk voting!";
        } else {
            // Mengambil atau Membuat data mahasiswa
            $studentQuery = "SELECT StudentID FROM Students WHERE NIM = ?";
            $params = array($nim);
            $stmt = sqlsrv_query($conn, $studentQuery, $params);
            
            if ($stmt && $student = sqlsrv_fetch_array($stmt)) {
                $studentId = $student['StudentID'];
                
                // Update nama jika berbeda
                $updateNameQuery = "UPDATE Students SET Name = ? WHERE StudentID = ?";
                $params = array($name, $studentId);
                sqlsrv_query($conn, $updateNameQuery, $params);
            } else {
                // Menambahkan new student ke database tabel Students
                $insertQuery = "INSERT INTO Students (NIM, Name) VALUES (?, ?)";
                $params = array($nim, $name);
                $stmt = sqlsrv_query($conn, $insertQuery, $params);
                
                if ($stmt) {
                    $studentId = sqlsrv_query($conn, "SELECT SCOPE_IDENTITY() as id");
                    $row = sqlsrv_fetch_array($studentId);
                    $studentId = $row['id'];
                }
            }
            
            $_SESSION['student_id'] = $studentId;
            $_SESSION['student_name'] = $name;
            header('Location: vote.php');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Voting BEM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login Voting BEM</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label>Login Sebagai:</label>
                <select name="userType" id="userType" onchange="toggleLoginForm()">
                    <option value="student">Mahasiswa</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            
            <div id="studentForm">
                <div class="form-group">
                    <label>NIM:</label>
                    <input type="text" name="nim" required>
                </div>
                <div class="form-group">
                    <label>Nama:</label>
                    <input type="text" name="name" required>
                </div>
            </div>
            
            <div id="adminForm" style="display:none;">
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="username">
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password">
                </div>
            </div>
            
            <button type="submit" name="login" class="login-button">Login</button>
        </form>
    </div>

    <script>
        function toggleLoginForm() {
            const userType = document.getElementById('userType').value;
            const studentForm = document.getElementById('studentForm');
            const adminForm = document.getElementById('adminForm');
            
            if (userType === 'admin') {
                studentForm.style.display = 'none';
                adminForm.style.display = 'block';
                // Menghapus required attribute dari input Mahasiswa
                document.querySelector('input[name="nim"]').removeAttribute('required');
                document.querySelector('input[name="name"]').removeAttribute('required');
                // Menambahkan required attribute pada input Admin
                document.querySelector('input[name="username"]').setAttribute('required', '');
                document.querySelector('input[name="password"]').setAttribute('required', '');
            } else {
                studentForm.style.display = 'block';
                adminForm.style.display = 'none';
                // Menambahkan required attribute pada input Mahasiswa
                document.querySelector('input[name="nim"]').setAttribute('required', '');
                document.querySelector('input[name="name"]').setAttribute('required', '');
                // Menghapus required attribute dari input Admin
                document.querySelector('input[name="username"]').removeAttribute('required');
                document.querySelector('input[name="password"]').removeAttribute('required');
            }
        }
    </script>
</body>
</html>