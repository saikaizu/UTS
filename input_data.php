<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Klasemen</title>
    <!-- Memasukkan link ke Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand text-white" href="#">AFC CUP U-23 Group Stage Input Data | Nama Operator: Sai Pratama/211011400994</a>
</nav>

<div class="container mt-3">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="negara">Nama Negara:</label>
            <select name="negara" id="negara" class="form-control">
                <option value="Qatar U-23">Qatar U-23</option>
                <option value="Indonesia U-23">Indonesia U-23</option>
                <option value="Australia U-23">Australia U-23</option>
                <option value="Yordania U-23">Yordania U-23</option>
            </select>
        </div>
        <div class="form-group">
            <label for="P">Jumlah Pertandingan (P):</label>
            <input type="text" name="P" id="P" class="form-control">
        </div>
        <div class="form-group">
            <label for="M">Jumlah Menang (M):</label>
            <input type="text" name="M" id="M" class="form-control">
        </div>
        <div class="form-group">
            <label for="S">Jumlah Seri (S):</label>
            <input type="text" name="S" id="S" class="form-control">
        </div>
        <div class="form-group">
            <label for="K">Jumlah Kalah (K):</label>
            <input type="text" name="K" id="K" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
// Tangkap data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $negara = $_POST['negara'];
    $P = $_POST['P'];
    $M = $_POST['M'];
    $S = $_POST['S'];
    $K = $_POST['K'];

    // Tulis data ke dalam file data.txt
    $data = "$negara,$P,$M,$S,$K\n";
    file_put_contents("data.txt", $data, FILE_APPEND | LOCK_EX);

    // Redirect ke halaman klasemen.php setelah data berhasil disimpan
    header("Location: klasemen.php");
    exit(); // Pastikan kode berhenti di sini untuk mencegah eksekusi lebih lanjut
}
?>

<!-- Memasukkan script Bootstrap JS (opsional, hanya diperlukan jika menggunakan fitur JavaScript Bootstrap) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
